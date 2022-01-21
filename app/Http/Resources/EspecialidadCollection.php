<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\VarDumper\VarDumper;

class EspecialidadCollection extends ResourceCollection
{

    public $collects = EspecialidadResource::class;

    public function toArray($request)
    {
        return  [
            'data' => $this->collection,
            'type' => 'Especialidades',
            'message' => 'Especialidades de forma paginado'
        ];
    }
}
