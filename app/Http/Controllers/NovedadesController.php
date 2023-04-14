<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class NovedadesController extends Controller
{
    public function index()
    {
        $personas = Persona::orderBy('id', 'desc')->get();
        return [
            'personas' => $personas,
            'estados' => array('FIRME', 'ABANDONO', 'OTRO', 'EN REVISION'),
        ];
    }
}
