<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;


class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Wedstrijd',
            'Training',
            'Belangrijk',
            'Overwinning',
            'Evenement',
            'Aankondiging',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName, 'slug' => Str::slug($tagName),]);
        }
    }
}
