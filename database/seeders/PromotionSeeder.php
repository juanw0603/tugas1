<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'title' => 'Summer Sale',
                'description' => 'Get up to 50% off on all items!',
                'image' => 'summer-sale.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Winter Discount',
                'description' => 'Enjoy a cozy winter with special discounts!',
                'image' => 'winter-discount.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Black Friday Deals',
                'description' => 'Limited-time offers for Black Friday!',
                'image' => 'black-friday.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
