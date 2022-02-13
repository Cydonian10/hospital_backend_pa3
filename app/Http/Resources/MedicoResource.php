<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'last_name' => $this->last_name,
            'especialidad_id' => $this->especialidad_id,
            'photo' => $this->photo,
            'status' => $this->status,
            'telefono' => $this->telefono,
            'titulo_medico' => $this->titulo_medico,
            'horarios' => $this->horarios,
            'especialidad' => $this->especialidad->name
        ];
    }
}
