<?php

namespace App\Domain\Animals\Actions;

use App\Domain\Animals\Models\Animal;
class UpdateAnimalAction
{
    public function execute(int $id) {
        /** @var Animal $animal */
        $animal = Animal::with('type')->find($id)->first();

        $animal->fill([
            'age' => $animal->type->max_age - 1,
            'size' => $animal->type->max_age - 1,
        ]);
    }
}
