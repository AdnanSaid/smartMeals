<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\DocBlock\Tag;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_post_index_is_rendered()
    {
        // First The user is created
        $user = factory(User::class)->make();
        //act as user
        $this->actingAs($user);
        // Then we want to make sure a post index is rendered
        $response = $this->get('/');
        //
        $response->assertStatus(200);
    }


    public function test_if_posts_are_created()
    {

        // First The user is created
        $user = factory(User::class)->make();

        Storage::fake('public');

        //act as user
        $this->actingAs($user)

            // Then we want to make sure a post is created
            ->post(route('post.store'), [
                'caption' => 'description of the post',
                'image' => $file = UploadedFile::fake()->image('avatar.png')
            ]);

        Storage::disk('public')->assertExists('avatar.jpg');

        $this->assertDatabaseCount('posts', 1);
    }
}

