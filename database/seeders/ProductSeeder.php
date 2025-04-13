<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Smartphone',
            'slug' => 'smartphone',
            'description' => 'Latest smartphone',
            'price' => 499.99,
            'stock' => 50,
            'images' => json_encode(['smartphone.jpg']),
        ]);

        $product->categories()->attach(Category::where('name', 'Electronics')->first()->id); 
    }
}
