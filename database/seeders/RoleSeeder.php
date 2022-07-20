<?php

namespace Database\Seeders;

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
        //superus, admin, docente, estudiante
        $superus = Role :: create(['name'=>'superus']);
        $admin = Role :: create(['name'=>'admin']);
        $docente = Role :: create(['name'=>'docente']);
        $estudiante = Role :: create(['name'=>'estudiante']);

        Permission::create(['name'=>'dashboard'])->syncRoles([$superus,$admin,$docente,$estudiante]);

        Permission :: create(['name'=>'categories.index'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.create'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.store'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.show'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.edit'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.update'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'categories.destroy'])->syncRoles([$admin,]);

        Permission :: create(['name'=>'roles.index'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.create'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.store'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.show'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.edit'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.update'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'roles.destroy'])->syncRoles([$admin,]);

        Permission :: create(['name'=>'users.index'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.create'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.store'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.show'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.edit'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.update'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'users.destroy'])->syncRoles([$admin,]);


                    
    }
}
