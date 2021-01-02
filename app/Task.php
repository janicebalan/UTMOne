<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    public $table = 'task';

    protected $casts = [
        'taskDue' => 'datetime',
    ];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->taskDue)->format( 'd/m/Y' .'  |  '. 'H:i');
    }

    public function calculateDue()
    {
        $now = Carbon::now();
        $future_date = $this->taskDue;

        if($future_date>$now){
            $interval = $future_date->diff($now);
            return $interval->format("Time remaining   %a days: %h hours: %i minutes: %s seconds");

        }
        else if($future_date<$now){
            $interval =$now->diff($future_date);
            return $interval->format("Overdue by   %a days: %h hours: %i minutes: %s seconds");
        }
    }

    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function post(){
        return $this->hasMany('App\Post');
    }
}
