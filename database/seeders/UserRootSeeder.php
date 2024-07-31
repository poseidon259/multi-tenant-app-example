<?php

namespace Database\Seeders;

use App\Infrastructure\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hung Tran Quang',
            'email' => 'hung.tranquang@amela.vn',
            'password' => Hash::make('Amela@123')
        ]);
    }
}
