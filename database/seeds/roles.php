<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
       /*  Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']); */
        $role = Role::create(['name' => 'administrator']);
        $role = Role::create(['name' => 'vizor']);

        $admin=User::create([
            'name'=> 'Raul',
            'lastname'=> 'Tavera',
            'email'=> 'tavera@gmail.com',
            'password' => bcrypt('12345678')

        ]);
        $admin->assignRole('administrator');

        $vizor=User::create([
            'name'=> 'Paco',
            'lastname'=> 'Sanchez',
            'email'=> 'pacosan@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $vizor->assignRole('vizor');

    }
}
