<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'edicion_id' => $this->edicion_id,
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
            'enlace_moddle' => $this->enlace_moddle,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'datos_edicion' => new EdicionResource($this->edicion),
        ];
    }
}
