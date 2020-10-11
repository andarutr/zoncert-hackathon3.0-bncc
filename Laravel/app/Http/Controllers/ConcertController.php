<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Concert;
use Auth;
use Storage;

class ConcertController extends Controller
{

    // Get
    public function Read()
    {
        $concert = Concert::paginate(10)->orderBy("created_at","DESC");

        return response()->json([
            "status"=>"success",
            "data"=> $concert
        ]);
    }
    //create
    public function Create(Request $req)
    {
		
	
        
    	// $req->validate([
    	// 	'name' => 'required',
    	// 	'thumbnail' => 'required',
    	// 	'description' => 'required',
    	// 	'category_id' => 'required',
    	// 	'type_id' => 'required',
    	// 	'start' => 'required',
    	// 	'end' => 'required',
    	// 	'location' => 'required',
    	// ]);

        if($req->thumbnail){
                
            $image_64 = $req->thumbnail; //your base64 encoded data
    
            $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
    
            // find substring fro replace here eg: data:image/png;base64,
    
            $image = str_replace($replace, '', $image_64); 
    
            $image = str_replace(' ', '+', $image); 
    
            $imageName = Auth::id() ."/". time().'.jpg';
    
            Storage::disk('public')->put($imageName, base64_decode($image));

            $imgUrl = env("APP_URL")."/storage/".$imageName;

        }
        
    	Concert::create([
    		'name' => $req->name,
    		'thumbnail' => $imgUrl,
    		'description' => $req->description,
    		'category_id' => implode(",",$req->category_id),
    		'type_id' => $req->type_id,
    		'start' => $req->start,
    		'end' => $req->end,
    		'like' => 0,
    		// 'discuss' => $req->discuss,
    		'location' => $req->location,
    		'user_id' => Auth::id(),
		]);
		
		return response()->json([
			"status"=>"success",
			"info"=> ""
		]);
    }

    // Edit
    public function Update(Request $req)
    {
    	$req->validate([
    		'name' => 'required',
	    	'description' => 'required',
	    	'category_id' => 'required',
	    	'type_id' => 'required',
	    	'start' => 'required',
	    	'end' => 'required',
	    	'location' => 'required',
    	]);

    	if($req->concertId)
    	{
    		$concert = Concert::find($req->concertId);

			if($concert->user_id == Auth::id()){

				
				if($req->thumbnail){
					
					$image_64 = $req->thumbnail; //your base64 encoded data
			
					$replace = substr($image_64, 0, strpos($image_64, ',')+1); 
			
					// find substring fro replace here eg: data:image/png;base64,
			
					$image = str_replace($replace, '', $image_64); 
			
					$image = str_replace(' ', '+', $image); 
			
					$imageName = Auth::id() ."/". time().'.jpg';
			
					Storage::disk('public')->put($imageName, base64_decode($image));

					$imgUrl = env("APP_URL")."/storage/".$imageName;

				}

				$concert->update([
					'name' => $req->name,
					'thumbnail' => $imgUrl,
					'description' => $req->description,
					'category_id' => $req->category_id,
					'type_id' => $req->type_id,
					'start' => $req->start,
					'end' => $req->end,
					'like' => NULL,
					// 'discuss' => $req->discuss,
					'location' => $req->location
				]);

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
    		// Redirect
    	}
    }
    // Delete

    public function Delete($id)
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
