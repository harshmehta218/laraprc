<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdmineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $user = [
            'name' => 'admine',
            'email' => 'admine@admine.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin'
        ];
        DB::table('users')->insert($user);
    }
}
