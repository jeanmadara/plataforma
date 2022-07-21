<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //roles y permisos
        $this->call(RoleSeeder :: class);

        //becas
        $this->call(ScholarshipSeeder :: class);

        // Usuarios base
        $this->call(UserSeeder :: class);

        // Categoria
        $this->call(CategorieSeeder :: class);

        
    }
}
