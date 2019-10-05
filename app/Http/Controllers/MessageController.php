<?php

namespace App\Http\Controllers;

use App\Mail\MessageIndividual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(){

        \request()->validate([
            'destino' => 'required',
            'asunto' => 'required'
        ]);

        Mail::to(\request()->get('destino'))->queue(new MessageIndividual(\request()->get('mensaje'),\request()->get('asunto')));

        return 'mensage enviado';
    }
}
