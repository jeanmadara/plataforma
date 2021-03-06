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

        Permission :: create(['name'=>'workshops.index'])->syncRoles([$admin,$docente,$estudiante,]);
        Permission :: create(['name'=>'workshops.create'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'workshops.store'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'workshops.show'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'workshops.edit'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'workshops.update'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'workshops.destroy'])->syncRoles([$admin,]);

        Permission :: create(['name'=>'activities.index'])->syncRoles([$admin,$docente,$estudiante,]);
        Permission :: create(['name'=>'activities.create'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'activities.store'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'activities.show'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'activities.edit'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'activities.update'])->syncRoles([$admin,$docente,]);
        Permission :: create(['name'=>'activities.destroy'])->syncRoles([$admin,]);

        Permission :: create(['name'=>'admin.index'])->syncRoles([$admin,]);
        Permission :: create(['name'=>'student.index'])->syncRoles([$estudiante,]);
        Permission :: create(['name'=>'teacher.index'])->syncRoles([$docente,]);
        Permission :: create(['name'=>'student.teacher'])->syncRoles([$estudiante,$docente]);



                    
    }
}
