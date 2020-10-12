<?php

namespace App\Http\Controllers;

use App\CostConcert;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function Create(Request $request, $concert)
    {
    	CostConcert::create([
    		'concert_id' => $concert,
    		'name' => $request->name,
    		'cost' => $request->cost,
    	]);

    	return response()->json([
			"status"=>"success",
			"info"=> ""
		]);
    }
}
