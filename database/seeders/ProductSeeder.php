<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product = [
            [
                'product_code' => 'PCX0001',
                'title' => 'Laptop Lenovo',
                'product_name' => '1600000',
                'price' => 'IDR',
                'currency' => '1',
                'discount' => '0',
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCR',
                'created_at' => '2023-09-21 00:00:00',
                'updated_at' => '2023-09-21 00:00:00',
            ],
            [
                'product_code' => 'PCX0002',
                'title' => 'Laptop HP',
                'product_name' => '1350000',
                'price' => 'IDR',
                'currency' => '1',
                'discount' => '20',
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCR',
                'created_at' => '2023-09-21 00:00:00',
                'updated_at' => '2023-09-21 00:00:00',
            ],
        ];
        foreach ($product as $key => $value){
            Product::create($value);
        }
    }
}
