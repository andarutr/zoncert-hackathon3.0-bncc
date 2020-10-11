<?php

namespace App\Http\Controllers;

use App\CostConcert;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function Buy(Request $request, $concert, $cost)
    {
    	CostConcert::create([
    		'concert_id' => $concert,
    		'name' => $request->name,
    		'cost' => $cost,
    	]);

    	return response()->json([
			"status"=>"success",
			"info"=> ""
		]);
    }
}
