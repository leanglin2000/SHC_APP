<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           
            ['name' => 'KHMER'],
            ['name' => 'ENGLISH'],
             ['name' => 'COMPUTER'],
             ['name' => 'WORSHIP'],
             ['name' => 'SPORT'],
        ];

        foreach ($data as $record) {
            Category::create($record);
        };
    }
}
