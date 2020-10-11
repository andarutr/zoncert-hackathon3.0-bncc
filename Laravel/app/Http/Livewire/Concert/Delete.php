<?php

namespace App\Http\Livewire\Concert;

use App\Concert;
use Livewire\Component;

class Delete extends Component
{
    public function render()
    {
        return view('livewire.concert.delete');
    }

    public function destroy($id)
    {
    	if($id)
    	{
    		$concert = Concert::find($id);
    		$concert->delete();
    		// Redirect
    	}
    }
}
