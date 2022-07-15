<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User :: create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$5tcFq9Oke56pSW7vUuCm0.tEA966ahCm.fk77H9OZbZ3m0woIZU2S',// password
            'remember_token'=>Str :: random(10),
           ])->assignRole('admin');
    }
}
