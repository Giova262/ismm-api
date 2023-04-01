<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'sexo',
        'fecha_nacimiento',
        'fecha_ingreso',
        'telefono',
        'email',
        'comentario',
        'testimonio',
        'religion',
        'bautizado',
        'edad',
        'iglesia',
        'foto_url',
        'direccion',
    ];

    // public $timestamps = false;
}
