<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrador',
            'email' => 'Admin@gmail.com',
            'password' =>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name'=>'Comensal',
            'email' => 'Cmm@gmail.com',
            'password' =>bcrypt('password')
        ])->assignRole('Comensal');

        User::create([
            'name'=>'Mozo',
            'email' => 'Mmzo@gmail.com',
            'password' =>bcrypt('passwordMozo')
        ])->assignRole('Mozo');

        User::create([
            'name'=>'Cocina',
            'email' => 'Ccina@gmail.com',
            'password' =>bcrypt('passwordCocina')
        ])->assignRole('Cocina');

        User::create([
            'name'=>'Cajero',
            'email' => 'Cjero@gmail.com',
            'password' =>bcrypt('passwordCajero')
        ])->assignRole('Cajero');

       
    }
}
