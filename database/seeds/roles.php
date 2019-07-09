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
        $role = Role::create(['name' => 'administrador']);
        $role = Role::create(['name' => 'vizor']);

        $admin=User::create([
            'name'=> 'Admin',
            'lastname'=> 'Host',
            'email'=> 'sistemas@teleton.org.mx',
            'password' => bcrypt('$istemas2019')

        ]);
        $admin->assignRole('administrador');

        $admin=User::create([
            'name'=> 'Raul',
            'lastname'=> 'Tavera',
            'email'=> 'tavera@gmail.com',
            'password' => bcrypt('12345678')

        ]);
        $admin->assignRole('administrador');

        $vizor=User::create([
            'name'=> 'Vizor',
            'lastname'=> 'Secundario',
            'email'=> 'vizor_prueba@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $vizor->assignRole('vizor');

    }
}
