<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Concert;
use App\TicketConcert;
use Auth;
use Storage;

class ConcertController extends Controller
{

    // Get
    public function Read()
    {
        $concert = Concert::orderByDesc("created_at")->paginate(10);

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

    // Populer
    public function Populer()
    {
        $concert = Concert::orderByDesc('like')->paginate(10);

        return response()->json([
            "status"=>"success",
            "data"=> $concert
        ]);   
    }

    // Search 
    public function Search(Request $request)
    {
        $keyword = $request->keyword;
        $concert = Concert::where('name','like','%'.$keyword.'%')
                            ->orWhere('category_id','like','%'.$keyword.'%')
                            ->orWhere('type_id','like','%'.$keyword.'%')
                            ->paginate(10);

        return response()->json([
            "status"=>"success",
            "data"=> $concert
        ]);  
	}
	// 
	public function MyConcert(){
		return json_encode(Concert::orderBy("created_at","DESC")
		->where("user_id",Auth::id())
		->orWhere(function($query) {
			$listId = TicketConcert::get()
			->where("user_id",Auth::id())
			->where("status","Verified")
			->pluck("concert_id")->toArray();
			$query->whereIn('id', $listId);
		})
		->paginate(10));
	}

    public function MyTicket(){
        return json_encode(TicketConcert::orderBy("created_at","DESC")->with("concert")->where("user_id",Auth::id())->paginate(10));
	}
	
	public function ById($id){
		return json_encode(Concert::with("CostConcert")->find($id));
	}
}
