<?php

namespace Tests\Feature\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_create_a_post()
    {
        // Create a user with necessary permission
        $user = User::factory()->create();
        $role = Role::findByName('editor'); // Replace with your role name
        $user->assignRole($role);
        Sanctum::actingAs($user);
        $data = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
        $response = $this->post('/posts', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', $data);
    }
}
