<?php

namespace App\Http\Livewire\Concert;

use App\Concert;
use Livewire\Component;
use Auth;

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
            
            if(Auth::id() == $concert->id){
                $concert->delete();
                return response()->json([
                    "status"=>"success",
                    "info"=> ""
                ]);
            }else{
                return response()->json([
					"status"=>"error",
					"info"=> "you don't have access"
				]);
            }
    		
    	}
    }
}
