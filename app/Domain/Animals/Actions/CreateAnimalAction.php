<?php

namespace App\Domain\Animals\Actions;

use App\Domain\Animals\Models\Animal;

class CreateAnimalAction
{
    public function execute(array $data): Animal {
        $animal = new Animal();
        $animal->animal_type_id = $data['animal_type_id'];
        $animal->name = $data['name'];
        $animal->save();
        return $animal;
    }
}
