<?php

namespace App\Http\Resources;

use App\Http\Resources\TarjetaResource;
use App\Http\Resources\ProyectoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SolicitudResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'mensaje'=>$this->mensaje,
            'proyecto_id'=>ProyectoResource::collection($this->proyecto),
            'tarjeta_id'=>TarjetaResource::collection($this->tarjeta),
        ];
    }
}
