<?php

namespace Database\Seeders;

use App\Models\Inventory;

class InventorySeeder extends CsvSeeder
{
    const CSV_PATH = 'data/inventory.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::unguard();

        // Read the data
        $data = $this->readCsv(self::CSV_PATH);

        foreach ($data as $row) {
            Inventory::create([
                'id' => $row['id'],
                'product_id' => $row['product_id'],
                'quantity' => $row['quantity'],
                'color' => $row['color'],
                'size' => $row['size'],
                'weight' => $row['weight'],
                'price' => $row['price_cents'] / 100,
                'sale_price' => $row['sale_price_cents'] / 100,
                'cost' => $row['cost_cents'] / 100,
                'sku' => $row['sku'],
                'length' => $row['length'],
                'width' => $row['width'],
                'height' => $row['height'],
                'note' => $row['note'],
            ]);
        }
    }
}
