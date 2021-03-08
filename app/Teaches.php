<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teaches extends Model
{
    protected $table = 'teaches';
    
    protected $fillable = [
        'type',
        'acess_doubts',
        'acess_manage_modules',
        'acess_manage_questionary',
        'acess_manage_work',
        'acess_evaluate_questionary',
        'acess_evaluate_work',
        'reason_tutor',
        'user_id',
        'course_id',
        'is_temporary',
        'dt_begin_ministering',        
        'dt_end_ministering'
    ];
}
