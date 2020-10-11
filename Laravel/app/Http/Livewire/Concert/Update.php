<?php

namespace App\Http\Livewire\Concert;

use App\Concert;
use Livewire\Component;
use Auth;
use Storage;

class Update extends Component
{
	public $name, $thumbnail, $description, $category_id, $type_id, $start, $end, $like, $discuss, $location, $user_id, $concertId;

    public function render()
    {
        return view('livewire.concert.update');
    }

    public function showConcert($concert)
    {
    	$this->name = $concert['name'];
    	$this->description = $concert['description'];
    	$this->thumbnail = $concert['thumbnail'];
    	$this->category_id = $concert['category_id'];
    	$this->type_id = $concert['type_id'];
    	$this->start = $concert['start'];
    	$this->end = $concert['end'];
    	$this->like = $concert['like'];
    	$this->discuss = $concert['discuss'];
    	$this->location = $concert['location'];
    	$this->user_id = $concert['user_id'];
    	$this->concertId = $concert['id'];
    }

    public function update()
    {
    	$this->validate([
    		'name' => 'required',
	    	'description' => 'required',
	    	'category_id' => 'required',
	    	'type_id' => 'required',
	    	'start' => 'required',
	    	'end' => 'required',
	    	'location' => 'required',
    	]);

    	if($this->concertId)
    	{
    		$concert = Concert::find($this->concertId);

			if($concert->user_id == Auth::id()){

				
				if($this->thumbnail){
					
					$image_64 = $this->thumbnail; //your base64 encoded data
			
					$replace = substr($image_64, 0, strpos($image_64, ',')+1); 
			
					// find substring fro replace here eg: data:image/png;base64,
			
					$image = str_replace($replace, '', $image_64); 
			
					$image = str_replace(' ', '+', $image); 
			
					$imageName = Auth::id() ."/". time().'.jpg';
			
					Storage::disk('public')->put($imageName, base64_decode($image));

					$imgUrl = env("APP_URL")."/storage/".$imageName;

				}

				$concert->update([
					'name' => $this->name,
					'thumbnail' => $imgUrl,
					'description' => $this->description,
					'category_id' => $this->category_id,
					'type_id' => $this->type_id,
					'start' => $this->start,
					'end' => $this->end,
					'like' => NULL,
					'discuss' => $this->discuss,
					'location' => $this->location
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
}
