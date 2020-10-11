<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Type;
use Auth;
use App\Like;
use App\Concert;

class HelperController extends Controller
{
    //
    public function getCategory(){
        return json_encode(Category::all());
    }
    public function getType(){
        return json_encode(Type::all());
    }
    public function Like($id){
        if(Auth::id()){
            $cek = Like::where("user_id",Auth::id())->where("concert_id",$id)->first();
            if(!$cek){
                $data = new Like;
                $data->user_id = Auth::id();
                $data->concert_id =$id;
                $data->save();

                $update = Concert::find($id);
                $update->like = Like::where("concert_id",$id)->count();
                $update->save();
                
            }

            return response()->json([
                "status"=> "success"
            ]);
        }
    }
}
