<?php

namespace Tests\Feature\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CommentOnPostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_comment_on_a_post()
    {
        // Create a user with necessary permission
        $user = User::factory()->create();
        $role = Role::findByName('editor'); // Replace with your role name
        $user->assignRole($role);
        Sanctum::actingAs($user);
        $post = Post::factory()->create();
        $data = [
            'body' => $this->faker->sentence,
            'post_id' => $post->id,
        ];
        $response = $this->post('/posts/' . $post->id . '/comments', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('comments', $data);
    }
}
