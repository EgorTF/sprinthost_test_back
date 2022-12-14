<?php

namespace App\Events;

use App\Domain\Animals\Models\Animal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnimalAgeUp implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Animal $animal;
    private string $queue;

    public function __construct(Animal $animal) {
        $this->animal = $animal;
    }
    public function __invoke() {

    }
    public function broadcastAs(): string
    {
        return 'animal.AgeUp';
    }

    public function broadcastOn(): Channel
    {
        return new Channel('public.animals');
    }
}
