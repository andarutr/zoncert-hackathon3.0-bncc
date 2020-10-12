<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostConcert extends Model
{
    protected $table = 'cost_concerts';
    protected $fillable = [
    	'name', 'concert_id','cost'
    ];
}
