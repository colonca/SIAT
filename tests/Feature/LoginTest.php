<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class LoginTest extends TestCase
{

    /** @test */
    public function it_visit_to_page_of_login()
    {
        $this->get('/login')
             ->assertStatus(200)
             ->assertSee('Iniciar Sesión');
    }

    /** @test */
    public function authenticated_to_a_user()
    {

        $credentials = [
            "cedula" => "1065848333",
            "password" => "camilo14"
        ];

        $response = $this->post('/login', $credentials);
        $response->assertRedirect('/dashboard');
        $this->assertCredentials($credentials);

    }

    /** @test */
    public function the_email_is_required_for_authenticate()
    {

        $credentials = [
            "cedula" => null,
            "password" => "camilo14"
        ];

        $response = $this->from('/login')->post('/login', $credentials);
        $response->assertRedirect('/login')->assertSessionHasErrors([
            'cedula' => 'The cedula field is required.',
        ]);
    }

    /** @test */
    public function the_password_is_required_for_authenticate()
    {

        $credentials = [
            "cedula" => "zaratedev@gmail.com",
            "password" => null
        ];

        $response = $this->from('/login')->post('/login', $credentials);
        $response->assertRedirect('/login')
            ->assertSessionHasErrors([
                'password' => 'The password field is required.',
            ]);
    }

    /** @test */
    public function not_authenticate_to_a_user_with_credentials_invalid()
    {

        $credentials = [
            "cedula" => "1065848332",
            "password" => "camilo14"
        ];

        $this->assertInvalidCredentials($credentials);
    }

}
