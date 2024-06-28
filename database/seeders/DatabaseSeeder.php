<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([CustomerSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([OrderSeeder::class]);
        $this->call([OrderItemSeeder::class]);
        // $this->call([ProductSeeder::class,]);

    }
}
