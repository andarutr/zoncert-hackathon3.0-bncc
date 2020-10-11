<?php

namespace App\Http\Livewire\Concert;

use App\Concert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;
use Auth;

class Create extends Component
{
	use WithFileUploads;

	public $name, $thumbnail, $description, $category_id, $type_id, $start, $end, $like, $discuss, $location, $user_id;

    public function render()
    {
        return view('livewire.concert.create');
    }

    public function store()
    {
    	$this->validate([
    		'name' => 'required',
    		'thumbnail' => 'required',
    		'description' => 'required',
    		'category_id' => 'required',
    		'type_id' => 'required',
    		'start' => 'required',
    		'end' => 'required',
    		'location' => 'required',
    	]);

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
        
    	Concert::create([
    		'name' => $this->name,
    		'thumbnail' => $imgUrl,
    		'description' => $this->description,
    		'category_id' => $this->category_id,
    		'type_id' => $this->type_id,
    		'start' => $this->start,
    		'end' => $this->end,
    		'like' => NULL,
    		'discuss' => $this->discuss,
    		'location' => $this->location,
    		'user_id' => Auth::id(),
		]);
		
		return response()->json([
			"status"=>"success",
			"info"=> ""
		]);

        // Redirect
    }
}
