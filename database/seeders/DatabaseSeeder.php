<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Clear out any old data to prevent duplication errors
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Insert Categories and grab their IDs
        $shoesId = DB::table('categories')->insertGetId(['name' => 'Shoes']);
        $helmetsId = DB::table('categories')->insertGetId(['name' => 'Helmets']);
        $ballsId = DB::table('categories')->insertGetId(['name' => 'Balls']);
        DB::table('categories')->insert(['name' => 'Pants']);
        DB::table('categories')->insert(['name' => 'Tops']);
        $equipmentId = DB::table('categories')->insertGetId(['name' => 'Equipment']);
        DB::table('categories')->insert(['name' => 'Training gear']);

        // 3. Insert Sample Products mapped to those categories
        DB::table('products')->insert([
            [
                'name' => 'adidas Euro16 Top Soccer Ball',
                'description' => 'Premium match ball featuring high durability and precise flight controls.',
                'price' => 46.00,
                'sale_price' => 34.95,
                'image_path' => 'soccerBall.jpg',
                'is_featured' => true,
                'category_id' => $ballsId,
            ],
            [
                'name' => 'Pro-tec Classic Skate Helmet',
                'description' => 'High-impact protection with a timeless classic multi-sport design layout.',
                'price' => 70.00,
                'sale_price' => null,
                'image_path' => 'skateHelmet.jpg',
                'is_featured' => true,
                'category_id' => $helmetsId,
            ],
            [
                'name' => 'Nike Sport 600ml Water Bottle',
                'description' => 'Leak-proof sports hydration bottle with visual capacity markers.',
                'price' => 17.50,
                'sale_price' => 15.00,
                'image_path' => 'waterBottle.jpg',
                'is_featured' => true,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Sting ArmaPlus Boxing Gloves',
                'description' => 'Professional grade leather combat gloves with secure wrist protection wrap.',
                'price' => 79.99,
                'sale_price' => null,
                'image_path' => 'boxingGloves.jpg',
                'is_featured' => true,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Asics Gel-Lethal Tiger 8 IT footy shoes',
                'description' => 'Lightweight professional football cleats optimized for firm natural ground.',
                'price' => 17.50,
                'sale_price' => 15.00,
                'image_path' => 'footyBoots.jpg',
                'is_featured' => true,
                'category_id' => $shoesId,
            ]
        ]);
    }
}
