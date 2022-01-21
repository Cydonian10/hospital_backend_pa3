<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EspecialidadResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            //'medicos' => $this->medicos
        ];
    }
}
