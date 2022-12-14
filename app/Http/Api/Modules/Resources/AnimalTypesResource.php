<?php

namespace App\Http\Api\Modules\Resources;
use App\Domain\Animals\Models\AnimalType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin AnimalType */
class AnimalTypesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'image' => $this->getImagePath(),
            'max_age' => $this->max_age,
            'max_size' => $this->max_size,
            'growing_factor' => $this->growing_factor
        ];
    }

    public static function collect($resource): AnonymousResourceCollection
    {
        return static::collection($resource);
    }
}
