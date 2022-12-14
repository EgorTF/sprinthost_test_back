<?php

namespace App\Domain\Animals\Actions;

use App\Domain\Animals\Models\Animal;

class DeleteAnimalAction
{
    public function execute(int $id) {
        $animal = Animal::findOrFail($id);
        $animal->delete();
    }
}
