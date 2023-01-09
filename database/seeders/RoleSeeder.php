<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=  Role::create(['name'=>'Admin']);
        $role2=  Role::create(['name'=>'Mozo']);
        $role3=  Role::create(['name'=>'Cocina']);
        $role4=  Role::create(['name'=>'Cajero']);
        $role5=  Role::create(['name'=>'Comensal']);


        Permission::create(['name'=>'mesa.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'users.index'])->syncRoles([$role1]);

        Permission::create(['name'=>'cliente.index'])->syncRoles([$role1,$role2]);
       
        Permission::create(['name'=>'plato.index'])->syncRoles([$role1]);

        Permission::create(['name'=>'entradas'])->syncRoles([$role1,$role2, $role5]);
        Permission::create(['name'=>'principal'])->syncRoles([$role1,$role2, $role5]);
        Permission::create(['name'=>'postre'])->syncRoles([$role1,$role2, $role5]);
        Permission::create(['name'=>'bebida'])->syncRoles([$role1,$role2, $role5]);

        Permission::create(['name'=>'pedidos.index'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name'=>'pedidos.historial'])->syncRoles([$role1,$role4]);

    }
}
