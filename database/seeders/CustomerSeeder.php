<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('customers')->insert([
            'full_name' => 'Jhon Doe',
            'username' => 'john',
            'email' => 'john@gmail.com',
            'phone_number' => '0892837123',
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }
}
