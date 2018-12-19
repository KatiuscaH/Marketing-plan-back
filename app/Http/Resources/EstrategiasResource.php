<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstrategiasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "fecha" => $this->fecha,
            "id" => $this->id,
            "indicador_logro" => $this->indicador_logro,
            "objetivo_id" => $this->objetivo->nombre,
            "presupuesto" => $this->presupuesto,
            "responsable" => $this->responsable,
            "tactica" => $this->tactica
        ];
    }
}
