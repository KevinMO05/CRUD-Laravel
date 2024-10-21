<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'marca_vehiculo', 'precio', 'anio_vehiculo', 'fecha_publicacion','foto'];

    
}

