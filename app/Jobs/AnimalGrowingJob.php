<?php

namespace App\Jobs;

use App\Domain\Animals\Models\Animal;
use App\Events\AnimalAgeUp;
use App\Events\AnimalKill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AnimalGrowingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Animal $animal;

    public function __construct(Animal $animal) {
        $this->animal = $animal;
    }

    public function handle() {
        for ($i = 0; $i < $this->animal->type->max_age; $i = $this->animal->age) {
            $animal = Animal::find($this->animal->id);
            $this->animal->size = $animal->size;
            $this->animal->age = $animal->age;
            $age_by_size = $this->animal->type->max_age / $this->animal->type->max_size;
            $this->animal->size += 1;
            $this->animal->age += $age_by_size;
            $this->animal->save();
            AnimalAgeUp::dispatch($this->animal);
            sleep(2);
        }
        AnimalKill::dispatch($this->animal);
    }
}
