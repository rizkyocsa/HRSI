<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nama' => 'Admin',
            ],
            [
                'nama' => 'Lead',
            ],
            [
                'nama' => 'HRD',
            ],
            [
                'nama' => 'Keuangan',
            ],
            [
                'nama' => 'Pegawai',
            ],
        ];

        foreach($roles as $key => $role){
            Role::create($role);
        }
    }
}
