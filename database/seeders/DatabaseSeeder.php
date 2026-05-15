<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'Sneakers',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_id' => 2,
                'category_name' => 'Sports',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],            
        ]);

        DB::table('products')->insert([
            [
                'product_id' => 1,
                'category_id' => 1,
                'product_name' => 'Nike Air Max',
                'product_price' => 1500000,
                'product_stock' => 10,
                'product_image' => 'AIR_FORCE_1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'category_id' => 2,
                'product_name' => 'Adidas Ultraboost',
                'product_price' => 2000000,
                'product_stock' => 5,
                'product_image' => 'AIR_JORDAN_1_LOW.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'category_id' => 1,
                'product_name' => 'Nike P-6000',
                'product_price' => 1800000,
                'product_stock' => 8,
                'product_image' => 'NIKE_P_6000.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
