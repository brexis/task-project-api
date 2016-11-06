<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'user_id', 'project_id', 'status', 'deadline'
    ];

    protected $dates = ['deadline'];
}
