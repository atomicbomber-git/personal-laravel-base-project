<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        $password = 'password';
        $userData = factory(User::class)
            ->create(['password' => $password]);

        $response = $this->post(route('login'), [
            'username' => $userData->username,
            'password' => $password
        ]);
        
        // Succesful logins return in a redirect
        $response->assertStatus(302);
    }
}
