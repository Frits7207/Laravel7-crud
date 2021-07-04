<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name'=> 'create task']);
        Permission::create(['name'=> 'delete task']);
        Permission::create(['name'=> 'edit task']);
        Permission::create(['name'=> 'index task']);

        $role1= Role::create(['name' => 'Admin']);
        $role1->givePermissionTo(Permission::all());

        $role2= Role::create(['name' => 'Student']);
        $role2->givePermissionTo('create task', 'edit task', 'index task');
    }
}
