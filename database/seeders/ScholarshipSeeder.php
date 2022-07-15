<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Scholarship :: create([
            'name'=>'no beca',
            'description'=>'estudiante sin beca', 
           ]);
    }
}
