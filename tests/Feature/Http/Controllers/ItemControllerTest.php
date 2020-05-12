<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    /** @test para comprobar que solo usuarios autenticados pueden ver la pagina de inicio */
    public function item_index_display_all_products(){
        //$response = $this->get('/');
        //$response->assertSee('About');
        //$response->assertStatus(200);
    }

}
