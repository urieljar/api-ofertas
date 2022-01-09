<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $fillable = [
        'mensaje',
        'user_id',
        'proyecto_id',
        'tarjeta_id'
    ];
    //relacion de uno a muchos  (inversa)
    public  function user(){
        return $this->belongsToMany('App\Models\User');
    }
     public function proyecto(){
        //return $this->belongsToMany('App\Models\Proyecto');
        return $this->hasMany('App\Models\Proyecto','id','proyecto_id');
    }
    //relacion de muchos a muchos
     public function tarjeta(){
        //return $this->belongsToMany('App\Models\Tarjeta');
        return $this->hasMany('App\Models\Tarjeta', 'id','tarjeta_id');
    }
}
