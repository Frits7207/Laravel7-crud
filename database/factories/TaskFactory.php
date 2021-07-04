<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Activity;
use App\User;
use App\Project;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'task' =>$faker->name,
        'begindate' =>Carbon::now(),
        'enddate' =>Carbon::now()->addDays(10),
        'user_id'=> User::all()->random()->id,
        'project_id'=> Project::all()->random()->id,
        'activity_id'=> Activity::all()->random()->id,
       
     

    ];
});
