<?php

namespace Database\Seeders;

use App\Models\offers_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffersUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        offers_user::factory()
            ->count(10)
            ->create();
    }
}
