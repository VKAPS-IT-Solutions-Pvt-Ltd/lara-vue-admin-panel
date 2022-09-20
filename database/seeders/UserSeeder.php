<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Role,
    Permission
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'name'    => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('12345678'),
            'role_id'       => 1
        ]);


        $staffUser = User::create([
            'name'    => 'Staff',
            'email'         => 'staff@gmail.com',
            'password'      => Hash::make('123123'),
            'role_id'       => 2
        ]);
        

        $customerUser = User::create([
            'name'     => 'Customer',
            'email'         => 'customer@gmail.com',
            'password'      => Hash::make('123123'),
            'role_id'       => 3
        ]);
        
    }
}