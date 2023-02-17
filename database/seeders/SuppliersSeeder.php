<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\suppliers;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvData = fopen(base_path('database/txt/suppliers.txt'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                Suppliers::create([
                    'supplier' => $data['0'],
                    'country' => $data['1'],
                    'city' => $data['2'],
                    'street' => $data['3'],
                    'telephone' => $data['4'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
