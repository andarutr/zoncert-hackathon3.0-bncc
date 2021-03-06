<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = [
    	'name', 'thumbnail', 'description', 'category_id', 'type_id', 'start', 'end', 'like', 'discuss', 'location', 'user_id',
    ];

    // ticket
    public function CostConcert()
    {
        return $this->hasMany('App\CostConcert', 'concert_id');
    }
}
