<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_name'     => 'admin',
            'name'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('123456'),
            'department_id' => '1',
            'status_id'     => '1',
            'created_at'    => Carbon::now(),
        ]);
    }
}
