<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Sunday schcool'],
            ['name' => 'Bible study'],
            ['name' => 'Devotion'],
            ['name' => 'khmer classes'],
            ['name' => 'English classess'],
            ['name' => 'Program food'],
            ['name' => 'Patnership'],
            ['name' => 'Parenting']
        ];

        foreach ($data as $record) {
            Tag::create($record);
        };
    }
}
