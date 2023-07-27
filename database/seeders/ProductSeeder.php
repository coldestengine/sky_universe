<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        $weddingDressTypes = [
            "A-line",
            "Ballgown",
            "Mermaid",
            "Sheath",
            "Trumpet",
            "Tea-length",
            "Empire",
            "Fit-and-Flare",
            "Princess",
            "Boho",
            "Vintage",
            "Satin",
            "Lace",
            "Chiffon",
            "Tulle",
            "Organza",
            "Silk",
            "Crepe",
            "Off-the-shoulder",
            "V-neck",
            "Halter",
            "Illusion",
            "Backless",
            "Long Sleeve",
            "Short Sleeve",
            "Strapless",
            "One-shoulder",
            "High Neck",
            "Deep V-neck",
            "Bateau",
        ];

        $manSuitTypes = [
            "Single Breasted",
            "Double Breasted",
            "Two-Piece",
            "Three-Piece",
            "Tuxedo",
            "Slim Fit",
            "Regular Fit",
            "Classic Fit",
            "Modern Fit",
            "Shawl Lapel",
            "Notch Lapel",
            "Peak Lapel",
            "Mandarin Collar",
            "Formal Suit",
            "Casual Suit",
            "Business Suit",
            "Wedding Suit",
            "Linen Suit",
            "Seersucker Suit",
            "Checkered Suit",
            "Pinstripe Suit",
            "Windowpane Suit",
            "Corduroy Suit",
            "Velvet Suit",
            "Wool Suit",
            "Cotton Suit",
            "Silk Suit",
            "Tweed Suit",
            "Summer Suit",
        ];

        // three location
        $location = [
            "Singapore",
            "Malaysia",
            "Indonesia",
        ];
        for($i = 1; $i <= 24; $i++){
            DB::table('products')->insert([
                'name' => $faker->unique()->randomElement($weddingDressTypes),
                'description' => $faker->text(200),
                'gender' => 'female',
                'price' => $faker->numberBetween(500000, 15000000),
                'qty_s' => $faker->numberBetween(0, 20),
                'qty_m' => $faker->numberBetween(0, 20),
                'qty_l' => $faker->numberBetween(0, 20),
                'qty_xl' => $faker->numberBetween(0, 20),
                'image' => 'image/dress/dress'.$i.'.jpg',
                'location' => $location[($i % 8) % 3],
                'created_at' => now()
            ]);
        }

        for($i = 1; $i <= 24; $i++){
            DB::table('products')->insert([
                'name' => $faker->unique()->randomElement($manSuitTypes),
                'description' => $faker->text(200),
                'gender' => 'male',
                'price' => $faker->numberBetween(500000, 15000000),
                'qty_s' => $faker->numberBetween(0, 20),
                'qty_m' => $faker->numberBetween(0, 20),
                'qty_l' => $faker->numberBetween(0, 20),
                'qty_xl' => $faker->numberBetween(0, 20),
                'image' => 'image/suit/suit'.$i.'.jpg',
                'location' => $location[($i % 8) % 3],
                'created_at' => now()
            ]);
        }
    }
}
