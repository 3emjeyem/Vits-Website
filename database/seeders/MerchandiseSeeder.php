<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MerchandiseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $items = [
            ['Name' => 'VITS Hoodie', 'Stock' => 50, 'Category' => 'Clothing', 'DateAdded' => $now],
            ['Name' => 'VITS Cap', 'Stock' => 100, 'Category' => 'Accessories', 'DateAdded' => $now],
            ['Name' => 'VITS Sticker Pack', 'Stock' => 200, 'Category' => 'Accessories', 'DateAdded' => $now],
        ];

        foreach ($items as $item) {
            DB::table('merchandise')->insert($item);
        }
    }
}
