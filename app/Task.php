<?php

namespace App;
use App\Project;
use App\Activity;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;


    public function project()
{
    return $this->belongsTo(Project::class);
}

public function activity()
{ 
    return $this->belongsTo(Activity::class);
}

public function user()
{ 
    return $this->belongsTo(User::class);
}

}

