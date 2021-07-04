<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
        'name' => 'Admin',  
        'email' => 'Admin@gmail.com', 
        'password' => bcrypt('qwerty')])
        ->each(function (User $user){
            $user->assignRole('Admin');
        });

        factory(User::class, 1)->create([
            'name' => 'Student',  
            'email' => 'Student@gmail.com', 
            'password' => bcrypt('qwerty')])
            ->each(function (User $user){
                $user->assignRole('Student');
            });

        factory( User::class, 5)->create(); 
    }
} 