<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $table = 'task';

    protected $casts = [
        'taskDue' => 'datetime:dd-MM-yyyyThh',
    ];
}
