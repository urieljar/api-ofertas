<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TarjetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'categoria' => $this->categoria,
            'subcategoria' => $this->subcategoria,
            'nombre' => $this->nombre,
            'rfc' => $this->rfc,
            'telefono' => $this->telefono,
            'contacto' => $this->contacto,
            'tel_contacto' => $this->tel_contacto,
            'email_contacto' => $this->email_contacto
        ];
    }
   /* public function with($request){
        return[
            'version' => "1.0.0",
            'author_url' => url('http://google.com')
        ];
    }*/
}
