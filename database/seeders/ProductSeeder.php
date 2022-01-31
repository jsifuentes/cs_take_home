<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends CsvSeeder
{
    const CSV_PATH = 'data/products.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::unguard();

        // Read the data
        $data = $this->readCsv(self::CSV_PATH);

        foreach ($data as $row) {
            Product::create([
                'id' => $row['id'],
                'name' => $row['product_name'],
                'description' => $row['description'],
                'style' => $row['style'],
                'brand' => $row['brand'],
                'url' => $row['url'],
                'product_type' => $row['product_type'],
                'shipping_price' => $row['shipping_price'] * 100,
                'note' => $row['note'],
                'user_id' => $row['admin_id'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ]);
        }
    }
}
