<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="alumnos";
    //Datos que se mostraran en los objetos Jasón
    protected $fillable=['nombre','direccion','telefono','fec_nac'];
}
