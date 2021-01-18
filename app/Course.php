<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'courseID', 'courseName', 'courseCapacity', 'lecturerAssigned'];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
