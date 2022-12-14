<?php

namespace App\Observer;

use App\Domain\Animals\Models\Animal;
use App\Jobs\AnimalGrowingJob;

class AnimalObserver
{
    public function created(Animal $animal): void
    {
        AnimalGrowingJob::dispatch($animal)->onQueue('animals');
    }

}
