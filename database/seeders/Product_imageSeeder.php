<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
    use App\Models\productImage;

    class Product_imageSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
        $csvData = fopen(base_path('database/txt/productImage.txt'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                productImage::create([
                    'img' => $data['0'],
                    'product_id' => $data['1'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
