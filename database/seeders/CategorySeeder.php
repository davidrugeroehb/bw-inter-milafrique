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
        Category::create(['name' => 'Algemeen', 'order' => 1]);
        Category::create(['name' => 'Trainingen', 'order' => 2]);
        Category::create(['name' => 'Wedstrijden', 'order' => 3]);
        Category::create(['name' => 'Lidmaatschap', 'order' => 4]);
    }
}
