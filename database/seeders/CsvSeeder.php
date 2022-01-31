<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CsvSeeder extends Seeder
{
    protected function readCsv($path): array
    {
        // https://www.php.net/manual/en/function.str-getcsv.php#117692
        $csv = array_map('str_getcsv', file(dirname(__FILE__) . '/' . $path));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);

            // normalize
            foreach ($a as $key => $val) {
                if ($val === 'NULL') {
                    $a[$key] = null;
                }
            }
        });
        array_shift($csv);

        return $csv;
    }
}
