<?php

namespace Tests\Feature\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_update_a_post()
    {
        // Create a user with necessary permission
        $user = User::factory()->create();
        $role = Role::findByName('editor'); // Replace with your role name
        $user->assignRole($role);
        Sanctum::actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);  // Create a post by the user
        $updateData = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
        $response = $this->put('/posts/' . $post->id, $updateData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', $updateData + ['id' => $post->id]);
    }
}
