<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'Admin', 'description' => 'administrator'],
            ['role_name' => 'cashier', 'description' => 'kasir'],
            ['role_name' => 'chef', 'description' => 'koki'],
            ['role_name' => 'customer', 'description' => 'pelanggan'],
        ];
        DB::table('roles')->insert($roles);
    }
}