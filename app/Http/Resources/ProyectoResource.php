<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProyectoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return[
        'id' => $this->id,
        'nombre' => $this->nombre,
        'descripcion' => $this->descripcion
    ];
    }
     public function with($request){
        return[
            'version' => "1.0.0",
            'autor' => "Etni Uriel",
        ];
    }
}
