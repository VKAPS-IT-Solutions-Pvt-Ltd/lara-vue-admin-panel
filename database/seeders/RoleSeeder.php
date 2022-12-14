<?php

namespace Database\Seeders;
use App\Models\Role;



use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        //
        $data = $this->data();

        foreach ($data as $value){
            Role::create([
                'role_name' => $value['name']
            ]);
        }
        
    }
    public function data()
    {
        return [
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'customer'],
        ];
    }
}
