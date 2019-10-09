<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login/estudiante')
                ->type('usuario','1065133473')
                ->type('contraseña','1065133473')
                ->press('Ingresar')
                ->assertSee('Solicitar Cita')
               ->press('Solicitar Cita');

        });
    }
}
