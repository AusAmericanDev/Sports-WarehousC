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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $shoesId = DB::table('categories')->insertGetId(['name' => 'Shoes']);
        $helmetsId = DB::table('categories')->insertGetId(['name' => 'Helmets']);
        $ballsId = DB::table('categories')->insertGetId(['name' => 'Balls']);
        $pantsId = DB::table('categories')->insertGetId(['name' => 'Pants']);
        $topsId = DB::table('categories')->insertGetId(['name' => 'Tops']);
        $equipmentId = DB::table('categories')->insertGetId(['name' => 'Equipment']);
        $trainingGearId = DB::table('categories')->insertGetId(['name' => 'Training gear']);


        DB::table('products')->insert([
            [
                'name' => 'adidas Euro16 Top Soccer Ball',
                'description' => 'Premium match ball featuring high durability and precise flight controls.',
                'price' => 46.00,
                'sale_price' => 34.95,
                'image_path' => 'soccerBall.jpg',
                'is_featured' => 1,
                'category_id' => $ballsId,
            ],
            [
                'name' => 'Pro-tec Classic Skate Helmet',
                'description' => 'High-impact protection with a timeless classic multi-sport design layout.',
                'price' => 70.00,
                'sale_price' => null,
                'image_path' => 'skateHelmet.jpg',
                'is_featured' => 1,
                'category_id' => $helmetsId,
            ],
            [
                'name' => 'Nike Sport 600ml Water Bottle',
                'description' => 'Leak-proof sports hydration bottle with visual capacity markers.',
                'price' => 17.50,
                'sale_price' => 15.00,
                'image_path' => 'waterBottle.jpg',
                'is_featured' => 1,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Sting ArmaPlus Boxing Gloves',
                'description' => 'Professional grade leather combat gloves with secure wrist protection wrap.',
                'price' => 79.99,
                'sale_price' => null,
                'image_path' => 'boxingGloves.jpg',
                'is_featured' => 1,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Asics Gel-Lethal Tiger 8 IT footy shoes',
                'description' => 'Lightweight professional football cleats optimized for firm natural ground.',
                'price' => 17.50,
                'sale_price' => 15.00,
                'image_path' => 'footyBoots.jpg',
                'is_featured' => 1,
                'category_id' => $shoesId,
            ],
            [
                'name' => 'Asics Gel-Kayano Running Shoes',
                'description' => 'Premium high-performance running shoes designed with FlyteFoam cushioning for ultimate comfort and stability.',
                'price' => 260.00,
                'sale_price' => 195.00,
                'image_path' => 'AsicsShoes.jpg',
                'is_featured' => 0,
                'category_id' => $shoesId,
            ],
            [
                'name' => 'Nike Air Women Pink Tee',
                'description' => 'Comfortable cotton-blend lifestyle tee featuring a metallic silver Nike Air graphic chest imprint.',
                'price' => 45.00,
                'sale_price' => null,
                'image_path' => 'whitePinkTop.jpg',
                'is_featured' => 0,
                'category_id' => $topsId,
            ],
            [
                'name' => 'Adidas 3-Stripes Black Tee',
                'description' => 'Classic heavyweight cotton training tee featuring signature contrast white three-stripe shoulder accents.',
                'price' => 55.00,
                'sale_price' => null,
                'image_path' => 'blackTop.jpg',
                'is_featured' => 0,
                'category_id' => $topsId,
            ],
            [
                'name' => 'Adidas Originals Tracksuit Pants',
                'description' => 'Sleek slim-fit athletic fleece track pants featuring flare cuff leg cuts and embroidered logo detailing.',
                'price' => 110.00,
                'sale_price' => 85.00,
                'image_path' => 'tracksuit.jpg',
                'is_featured' => 0,
                'category_id' => $pantsId,
            ],
            [
                'name' => 'Nike Air Zoom Running Shoes',
                'description' => 'Lightweight mesh running shoe featuring responsive Zoom Air performance units.',
                'price' => 180.00,
                'sale_price' => 145.00,
                'image_path' => 'NikeShoe.jpg',
                'is_featured' => 0,
                'category_id' => $shoesId,
            ],
            [
                'name' => 'Adidas Predator Football Boots',
                'description' => 'Control the pitch with high-grip strike paths and firm ground optimization layers.',
                'price' => 240.00,
                'sale_price' => null,
                'image_path' => 'AdidasShoes.jpg',
                'is_featured' => 0,
                'category_id' => $shoesId,
            ],
            [
                'name' => 'Puma Smash Classic Sneakers',
                'description' => 'Retro leather styling designed for relaxed comfort lifestyle wear layouts.',
                'price' => 90.00,
                'sale_price' => 65.00,
                'image_path' => 'PumaShoes.jpg',
                'is_featured' => 0,
                'category_id' => $shoesId,
            ],
            [
                'name' => 'Spalding TF-1000 Basketball',
                'description' => 'Pro-grade indoor leather basketball providing maximum deep channel fingertip controls.',
                'price' => 95.00,
                'sale_price' => null,
                'image_path' => 'basketball.jpg',
                'is_featured' => 0,
                'category_id' => $ballsId,
            ],
            [
                'name' => 'Gilbert Synergie Netball',
                'description' => 'Official size match play netball with superior grip textured outer surfaces.',
                'price' => 38.00,
                'sale_price' => 29.00,
                'image_path' => 'Netball.jpg',
                'is_featured' => 0,
                'category_id' => $ballsId,
            ],
            [
                'name' => 'Giro Fixture Cycling Helmet',
                'description' => 'Mountain bike protection featuring an extended hardbody structural rear layout cover.',
                'price' => 85.00,
                'sale_price' => 72.00,
                'image_path' => 'GiroHelmet.jpg',
                'is_featured' => 0,
                'category_id' => $helmetsId,
            ],
            [
                'name' => 'Wilson Pro Staff Tennis Racket',
                'description' => 'Precision braided graphite core frame providing surgical control profiles.',
                'price' => 320.00,
                'sale_price' => null,
                'image_path' => 'Tennis.jpg',
                'is_featured' => 0,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Everlast Speed Skipping Rope',
                'description' => 'High-velocity plastic speed cable fitted with smooth rotation ball bearing sockets.',
                'price' => 22.00,
                'sale_price' => 15.00,
                'image_path' => 'Rope.jpg',
                'is_featured' => 0,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Under Armour Tech Training Shorts',
                'description' => 'Quick-drying ultra-soft performance gym shorts utilizing sweat-wicking materials.',
                'price' => 40.00,
                'sale_price' => null,
                'image_path' => 'UnderArmour.jpg',
                'is_featured' => 0,
                'category_id' => $pantsId,
            ],
            [
                'name' => 'Nike Dri-FIT Legend Tee',
                'description' => 'Moisture-wicking active t-shirt engineered to endure heavy cross-training sets.',
                'price' => 35.00,
                'sale_price' => 25.00,
                'image_path' => 'Niketee.jpg',
                'is_featured' => 0,
                'category_id' => $topsId,
            ],
            [
                'name' => 'Resistance Loop Bands 5-Pack',
                'description' => 'Premium heavy-duty latex bands spanning extra light to extra heavy fitness loads.',
                'price' => 25.00,
                'sale_price' => 19.95,
                'image_path' => 'ResistanceBands.jpg',
                'is_featured' => 0,
                'category_id' => $equipmentId,
            ],
            [
                'name' => 'Aussie Strength Yoga Mat',
                'description' => 'High-density eco-friendly padded non-slip texture cushioning baseline panel.',
                'price' => 60.00,
                'sale_price' => null,
                'image_path' => 'yoga.jpg',
                'is_featured' => 0,
                'category_id' => $equipmentId,
            ],
        ]);
    }
}
