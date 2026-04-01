<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'キウイ',
                'price' => 800,
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
            ],
            [
                'name' => 'メロン',
                'price' => 900,
            ],
        ]);
    }
}
