<?php

namespace App\Http\Controllers;

use Auth;
use App\TicketConcert;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function Create($id)
    {
    	TicketConcert::create([
    		'user_id' => Auth::id(),
    		'concert_id' => $id,
    		'cost_id' => $id,
    		'status' => $request->status,
    		'receipt' => $request->receipt,
    	]);

    	return response()->json([
			"status"=>"success",
			"info"=> ""
		]);
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
