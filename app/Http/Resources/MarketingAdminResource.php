<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarketingAdminResource extends JsonResource
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
            "id" => $this->id,
            "nombre" => $this->plan,
            "grupo" => $this->estudiantes,
            "empresario" => $this->users->where('rol', 2)->first()['nombre']
        ];
    }
}
