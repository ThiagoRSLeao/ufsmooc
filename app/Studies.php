<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    protected $table = 'studies';
    
    protected $fillable = [
        'data',
        'course_id',
        'student_id'
    ];
}
