<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /** @test para verificacion de la vista login */
    public function login_displays_the_login_form(){
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }   

    /** @test para comprobar errores de validacion y prueba de redirección 
     * cuando se genera un error de validación */
    public function login_displays_validation_errors(){
        $response = $this->post(route('login'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }
}
