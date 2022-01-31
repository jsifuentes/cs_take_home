<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends CsvSeeder
{
    const CSV_PATH = 'data/orders.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::unguard();

        // Read the data
        $data = $this->readCsv(self::CSV_PATH);

        foreach ($data as $row) {
            Order::create([
                'id' => $row['id'],
                'product_id' => $row['product_id'],
                'inventory_id' => $row['inventory_id'],
                'street_address' => $row['street_address'],
                'apartment' => $row['apartment'],
                'city' => $row['city'],
                'state' => $row['state'],
                'country_code' => $row['country_code'],
                'zip' => $row['zip'],
                'phone_number' => $row['phone_number'],
                'email' => $row['email'],
                'name' => $row['name'],
                'order_status' => $row['order_status'],
                'payment_ref' => $row['payment_ref'],
                'transaction_id' => $row['transaction_id'],
                'payment_amount' => (int)$row['payment_amt_cents'] / 100,
                'ship_charge' => (int)$row['ship_charged_cents'] / 100,
                'ship_cost' => (int)$row['ship_cost_cents'] / 100,
                'subtotal' => (int)$row['subtotal_cents'] / 100,
                'total' => $row['total_cents'] / 100,
                'shipper_name' => $row['shipper_name'],
                'paid_at' => $row['payment_date'],
                'shipped_at' => $row['shipped_date'],
                'tracking_number' => $row['tracking_number'],
                'tax_total' => (int)$row['tax_total_cents'] / 100,
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ]);
        }
    }
}
