<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SpelersSeeder extends Seeder
{
    public function run(): void
    {
        $spelers = [
            [
                'name' => 'Philippe Wilangi',
                'username' => 'Philippe Wilangi',
                'email' => 'philippewilangi@intermilafrique.be',
                'password' => Hash::make('password'),
                'position' => 'Keeper',
                'jersey_number' => 1,
                'bio' => 'De Courtois van Congo',
            ],
            [
                'name' => 'Gaël Kahumba',
                'username' => 'Gaël Kahumba',
                'email' => 'gaelkahumba@intermilafrique.be',
                'password' => Hash::make('password'),
                'position' => 'Aanvaller',
                'jersey_number' => 11,
                'bio' => 'Wordt vergeleken met Doku',
            ],
            [
                'name' => 'Maël Kabongo',
                'username' => 'Maël Kabongo',
                'email' => 'maelkabongo@intermilafrique.be',
                'password' => Hash::make('password'),
                'position' => 'Aanvaller',
                'jersey_number' => 14,
                'bio' => 'De topscoorder van de competitie.',
            ],
            [
                'name' => 'Glory Mandiangu',
                'username' => 'Glory Mandiangu',
                'email' => 'glorymandiangu@intermilafrique.be',
                'password' => Hash::make('password'),
                'position' => 'Aanvaller',
                'jersey_number' => 14,
                'bio' => 'Gevaarlijk op de flanken',
            ],
            [
                'name' => 'Samuel Selshimi',
                'username' => 'Samuel Selshimi',
                'email' => 'samuelshelsimi@intermilafrique.be',
                'password' => Hash::make('password'),
                'position' => 'Verdediger',
                'jersey_number' => 17,
                'bio' => 'Niemand gaat hem voorbij',
                        ],
        ];

        foreach ($spelers as $spelerData) {
            User::create($spelerData);
        }
    }
}
