<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps = false;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
