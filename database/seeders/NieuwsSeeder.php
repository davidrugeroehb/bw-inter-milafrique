<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nieuws;
use App\Models\User;

class NieuwsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        Nieuws::create([
            'title' => 'Grote overwinning tegen FC Brussels!',
            'content' => 'Inter Milafrique boekte gisteren een fantastische 5-2 overwinning tegen FC Brussels. Een sterke teamprestatie!',
            'user_id' => $admin->id,
            'published_at' => now(),
        ]);

        Nieuws::create([
            'title' => 'Nieuwe trainingen starten volgende week',
            'content' => 'Let op: vanaf volgende week trainen we op dinsdag en donderdag om 19:00 uur.',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(2),
        ]);

        Nieuws::create([
            'title' => 'Welkom bij Inter Milafrique!',
            'content' => 'Welkom op de nieuwe website van Inter Milafrique, jouw favoriete zaalvoetbalploeg!',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(5),
        ]);
    }
}
