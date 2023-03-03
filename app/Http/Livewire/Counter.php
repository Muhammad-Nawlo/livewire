<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $counter = 0;

    public function inc(): void
    {
        $this->counter++;
    }
    public function dec(): void
    {
        $this->counter--;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
