<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketConcert extends Model
{
    protected $table = 'ticket_concerts';
    protected $fillable = [
    	'user_id', 'concert_id','cost_id','receipt','status'
    ];

    public function concert()
    {
        return $this->hasOne('App\Concert', 'id','concert_id');
    }
}
