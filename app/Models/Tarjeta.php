<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
       /** 
         * categoria///area donde trabaja
         * subcategoria ///especialidad de trabajo 
         * nombre // nombre de la empresa o jefe de area
         * rfc // rfc de la empresa o el dueño de un grupo 
         * telefono // telefono de la empresa 
         * contacto // nombre del personal o contacto personal 
         * tel_contacto /// telefono de contacto personal 
         * email_contacto //email de contacto perosnal 
         */
    use HasFactory;
    protected $fillable = [
        'categoria',
        'subcategoria',
        'nombre',
        'rfc',
        'telefono',
        'contacto',
        'tel_contacto',
        'email_contacto',
    ];
    //relacion de muchos a muchos
    public function solicitud(){
        return $this->hasMany('App\Models\Solicitudes');
    }

}
