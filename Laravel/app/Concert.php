<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = [
    	'name', 'thumbnail', 'description', 'category_id', 'type_id', 'start', 'end', 'like', 'discuss', 'location', 'user_id',
    ];
}
