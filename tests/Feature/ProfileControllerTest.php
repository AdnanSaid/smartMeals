<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_profile_page_is_rendered()
    {
        //act as user
        $this->actingAs($user = factory(User::class)->create() );

        // Then we want to make sure a profile page is created
        $response = $this->get('/profile/'.$user->id);

        //
        $response->assertStatus(200);
    }
}
