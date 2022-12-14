<?php

namespace App\Http\Api\Modules\Controllers;

use App\Domain\Animals\Actions\CreateAnimalAction;
use App\Domain\Animals\Actions\DeleteAnimalAction;
use App\Domain\Animals\Actions\UpdateAnimalAction;
use App\Domain\Animals\Models\Animal;
use App\Domain\Animals\Models\AnimalType;
use App\Http\Api\Modules\Requests\CreateAnimalRequest;
use App\Http\Api\Modules\Resources\AnimalsResource;
use App\Http\Api\Modules\Resources\AnimalTypesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class AnimalsController extends Controller
{
    public function getAnimals(): AnonymousResourceCollection
    {
        return AnimalsResource::collection(
            Animal::with('type')->get()
        );
    }

    public function getTypes(): AnonymousResourceCollection
    {
        return AnimalTypesResource::collection(
            AnimalType::all()
        );
    }
    public function createAnimal(CreateAnimalRequest $request, CreateAnimalAction $action): AnimalsResource
    {
        return new AnimalsResource($action->execute($request->validated()));
    }

    public function updateAnimal(int $id, UpdateAnimalAction $action): JsonResponse
    {
        $action->execute($id);
        return response()->json(['data' => null]);
    }

    public function deleteAnimal(int $id, DeleteAnimalAction $action): JsonResponse
    {
        $action->execute($id);
        return response()->json(['data' => null]);
    }
}
