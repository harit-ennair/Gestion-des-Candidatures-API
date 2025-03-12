<?php

namespace Database\Seeders;

use App\Models\offers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    offers::factory()
        ->count(10)
        ->create();
    }
}
