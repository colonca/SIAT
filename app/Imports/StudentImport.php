<?php

namespace App\Imports;

use App\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante([
            'cedula' => $row[0],
            'nombres'=> $row[1],
            'programa'=> $row[2],
            'direccion'=> $row[3],
            'email'=> $row[4],
            'telefono'=> $row[5],
            'celular'=> $row[6],
            'periodo_academico'=> $row[7] == '' ? 0 : $row[7],
            'periodo_cronologico'=> $row[8] == '' ? 0 : $row[8],
            'promedio_general'=> $row[9] == '' ? 0 : $row[9],
            'promedio_semestral'=> $row[10] == '' ? 0 : $row[10],
            'estado'=> $row[11],
            'contraseña' => $row[0]
        ]);
    }
}
