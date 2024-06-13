<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitacion'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Nombre de la clave primaria

    public $timestamps = false; // Indica que no necesitas los campos created_at y updated_at en tu tabla

    protected $fillable = [
        'tipo',
        'numero',
        'precio',
        'fotografias'
    ];

    protected $guarded = [
        // Campos que NO están permitidos para asignación masiva
    ];
}

