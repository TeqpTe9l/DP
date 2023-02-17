<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvData = fopen(base_path('database/txt/product.txt'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                Product::create([
                    'title' => $data['0'],
                    'price' => $data['1'],
                    'new_price' => $data['2'],
                    'in_stock' => $data['3'],
                    'description' => $data['4'],
                    'category_id' => $data['5'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}