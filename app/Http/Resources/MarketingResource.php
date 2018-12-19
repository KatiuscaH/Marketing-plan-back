<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarketingResource extends JsonResource
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
            "ansoff"=> $this->ansoff,
            "bcg"=> $this->bcg,
            "clientes"=> $this->clientes,
            "competencia"=> $this->competencia,
            "created_at"=> $this->created_at,
            "coatrop"=> $this->coatrop,
            "dofa"=> $this->dofa,
            "historia"=> $this->historia,
            "id"=> $this->id,
            "estudiante"=> $this->users->where('rol', 1)->first(),
            "empresario" => $this->users->where('rol', 2)->first(),
            "mefi"=> $this->mefi,
            "pest"=> $this->pest,
            "plan"=> $this->plan,
            "presentacion"=> $this->presentacion,
            "proveedores"=> $this->proveedores,
            "porter"=> $this->porter,
            "estudiantes" => $this->estudiantes,
            "updated_at"=> $this->updated_at
        ];
    }
}
