<?php

namespace Tests\Feature;

use App\Estudiante;
use mysql_xdevapi\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function agendar_cita()
    {
        $this->withExceptionHandling();

        $estudiante = Estudiante::where('cedula','1065133473')->first();
        session()->put('estudiante',$estudiante);

        $credentials = [
            'personal_id' => '15',
            'hora' => '8',
            'fecha' => '2019-10-08'
        ];

        $response = $this->post(route('agendar'),$credentials);

        $response->assertJson([
           'status' => 'ok'
        ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function agendar_cita_para_una_misma_fecha()
    {
        $this->withExceptionHandling();
        $estudiante = Estudiante::where('cedula','1065133473')->first();
        session()->put('estudiante',$estudiante);

        $credentials = [
            'personal_id' => '15',
            'hora' => '9',
            'fecha' => '2019-10-08'
        ];

        $response = $this->post(route('agendar'),$credentials);
        $response->assertJson([
            'status' => 'error',
            'message' => 'Usted ya ha Agendado una Cita Anteriormente para este dia'
        ]);
    }

    /** @test */
    public function agendar_cita_credentiales_invalidas()
    {
        $this->withExceptionHandling();
        $estudiante = Estudiante::where('cedula','1065133473')->first();
        session()->put('estudiante',$estudiante);
        $credentials = [
            'personal_id' => '1065848333',
            'hora' => 'm',
            'fecha' => '2019-10-08'
        ];
        $response = $this->postJson(route('agendar'),$credentials);
        $response->assertJsonStructure([
            'message','errors'=>['hora']
        ]);
    }

}
