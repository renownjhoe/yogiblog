<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);


        // Assign roles to the user
        $this->assignRolesAndPermissionsForEditor($user);
        return $user;
    }


    /**
     * Assign roles and permissions to the user.
     *
     * @param \App\Models\User $user
     * @return void
     */
    protected function assignRolesAndPermissionsForEditor(User $user)
    {
        // Create roles and permissions if they do not exist
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $editPostsPermission = Permission::firstOrCreate(['name' => 'edit posts']);
        $deletePostsPermission = Permission::firstOrCreate(['name' => 'delete posts']);

        // Assign permissions to roles
        $editorRole->givePermissionTo($editPostsPermission);

        // Assign roles and permissions to the user
        $user->assignRole($editorRole);
        $user->givePermissionTo($editPostsPermission);
    }


    /**
     * Assign roles and permissions to the user.
     *
     * @param \App\Models\User $user
     * @return void
     */
    protected function assignRolesAndPermissionsForAdmin(User $user)
    {
        // Create roles and permissions if they do not exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editPostsPermission = Permission::firstOrCreate(['name' => 'edit posts']);
        $deletePostsPermission = Permission::firstOrCreate(['name' => 'delete posts']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([$editPostsPermission, $deletePostsPermission]);

        // Assign roles and permissions to the user
        $user->assignRole($adminRole);  // or $adminRole based on your logic
        $user->givePermissionTo($editPostsPermission);
        $user->givePermissionTo($deletePostsPermission);
    }
}
