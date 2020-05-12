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
    /** @test para comprobar que el exchange rate aparece en la pagina inicial */
    public function item_index_display_all_products(){
        $response = $this->get('/');
        $response->assertSee('Currency Exchange Rate');
    }

}
