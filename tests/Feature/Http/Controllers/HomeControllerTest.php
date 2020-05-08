<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class HomeControllerTest extends TestCase
{
    
    use RefreshDatabase;
    /** @test para comprobar que solo usuarios autenticados pueden ver la pagina de inicio */
    public function only_an_authenticated_user_can_see_home_page(){
        $user = factory(User::class)->create();

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response->assertRedirect(route('home'));
    $this->assertAuthenticatedAs($user);
    }
}