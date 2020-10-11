<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Type;

class HelperController extends Controller
{
    //
    public function getCategory(){
        return json_encode(Category::all());
    }
    public function getType(){
        return json_encode(Type::all());
    }
}
