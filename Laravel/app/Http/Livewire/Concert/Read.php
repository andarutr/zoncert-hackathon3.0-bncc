<?php

namespace App\Http\Livewire\Concert;

use App\Concert;
use Livewire\Component;

class Read extends Component
{
    public function render()
    {
    	$concert = Concert::all();
        return view('livewire.concert.read', compact('concert'));
    }
}
