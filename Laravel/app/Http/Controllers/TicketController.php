<?php

namespace App\Http\Controllers;

use Auth;
use App\TicketConcert;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function Buy($concert_id,$cost_id)
    {
		if(Auth::id()){
			TicketConcert::create([
				'user_id' => Auth::id(),
				'concert_id' => $concert_id,
				'cost_id' => $cost_id,
				'status' => 'Pending',
				'receipt' => '-',
			]);
	
			return response()->json([
				"status"=>"success",
				"info"=> ""
			]);
		}
    	
    }

    public function Delete($id)
    {
    	if($id)
    	{
            
            $ticket = TicketConcert::find($id);
            
            if(Auth::id() == $ticket->id){
                $ticket->delete();
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
