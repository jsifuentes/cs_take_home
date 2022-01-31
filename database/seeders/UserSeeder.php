<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends CsvSeeder
{
    const CSV_PATH = 'data/users.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        // Read the data
        $data = $this->readCsv(self::CSV_PATH);

        foreach ($data as $row) {
            User::create([
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password_plain']),
                'superadmin' => $row['superadmin'],
                'shop_name' => $row['shop_name'],
                'remember_token' => $row['remember_token'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'card_brand' => $row['card_brand'],
                'card_last_four' => $row['card_last_four'],
                'trial_ends_at' => $row['trial_ends_at'],
                'shop_domain' => $row['shop_domain'],
                'is_enabled' => $row['is_enabled'],
                'billing_plan' => $row['billing_plan'],
                'trial_starts_at' => $row['trial_starts_at'],
            ]);
        }
    }
}
