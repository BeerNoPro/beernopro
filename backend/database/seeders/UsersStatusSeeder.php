<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_status')->insert([
            [
                'name'          => 'Active',
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'InActive',
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
