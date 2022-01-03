<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name'      => 'John Doe',
            'username'  => 'johnnyd',
            'email'     => 'johndoe@email.com'
        ]);

        $user2 = User::make([
            'name'      => 'Jane Doe',
            'username'  => 'janed',
            'email'     => 'janedoe@email.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name'  => 'John',
            'username' => 'JohnnyD',
            'email' => 'johndoe@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertRedirect('/home');
    }

    public function test_database_is_missing_user()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'Steven'
        ]);
    }

}

