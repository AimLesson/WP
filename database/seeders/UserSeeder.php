<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name'      => 'MAS ADMIN',
                'username'  => 'ADMIN',
                'email'     => 'admin@atmi.com',
                'unit'      => 'ALL',
                'role'      => 'superadmin',
                'password'  => Hash::make('123'),
                'status'    => 'offline',
            ]
        );
        User::create(
            [
                'name'      => 'Mba Sales',
                'username'  => 'sales',
                'email'     => 'sales@atmi.com',
                'unit'      => 'MA',
                'role'      => 'user',
                'password'  => Hash::make('123'),
                'status'    => 'offline',
            ]
        );
        User::create(
            [
                'name'      => 'Yulius',
                'username'  => 'stikom',
                'email'     => 'stikom@atmi.com',
                'unit'      => 'MA',
                'role'      => 'admin',
                'password'  => Hash::make('123'),
                'status'    => 'offline',
            ]
        );
    }
}
