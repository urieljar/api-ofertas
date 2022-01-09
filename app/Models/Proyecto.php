<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
     //relacion de uno a muchos
  /*   public function solicitud(){
        //return $this->hasMany('App\Models\Solicitudes');
    }*/
    
}
