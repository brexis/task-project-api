<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'user_id', 'status', 'deadline'
    ];

    protected $dates = ['deadline', 'deleted_at'];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
