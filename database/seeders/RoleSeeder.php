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

        Permission :: create(['name'=>'scholarships.index'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.create'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.store'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.show'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.edit'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.update'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'scholarships.destroy'])->syncRoles([$admin,]);


                    
    }
}
