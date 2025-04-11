<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "php",
            "desc" => "laptop",
            "price" => 10000,
            "quantity" => 5,
            "image" => "1.png"
        ]);
        Product::create([
            "name" => "dell",
            "desc" => "laptop",
            "price" => 9000,
            "quantity" => 5,
            "image" => "3.png"
        ]);
        Product::create([
            "name" => "msi",
            "desc" => "laptop",
            "price" => 18000,
            "quantity" => 5,
            "image" => "2.png"
        ]);
    }
}
