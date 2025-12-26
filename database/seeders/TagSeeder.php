<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Wedstrijden',
            'Trainingen',
            'Belangrijk',
            'Overwinningen',
            'Evenementen',
            'Aankondigingen',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
