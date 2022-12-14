<?php

namespace App\Http\Api\Modules\Resources;

use App\Domain\Animals\Models\Animal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Animal */
class AnimalsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'age' => $this->age,
            'size' => $this->size,
        ];
    }

    public static function collect($resource): AnonymousResourceCollection
    {
        return static::collection($resource);
    }
}
