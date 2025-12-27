<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $algemeen = Category::where('name', 'Algemeen')->first();
            $trainingen = Category::where('name', 'Trainingen')->first();
            $wedstrijden = Category::where('name', 'Wedstrijden')->first();


            Faq::create([
                'category_id' => $algemeen->id,
                'question' => 'Wat is Inter Milafrique?',
                'answer' => 'Inter Milafrique is een dynamische zaalvoetbalploeg gevestigd in Steenokkerzeel',
                'order' => 1
            ]);

            Faq::create([
                'category_id' => $algemeen->id,
                'question' => 'Waar vinden de trainingen plaats?',
                'answer' => 'Onze trainingen vinden plaats in Sporthal Machelen, elke maandag.',
                'order' => 2
            ]);


            Faq::create([
                'category_id' => $trainingen->id,
                'question' => 'Wanneer trainen we?',
                'answer' => 'We trainen elke maandag van 21:00 tot 23:00 uur.',
                'order' => 1
            ]);

            Faq::create([
                'category_id' => $trainingen->id,
                'question' => 'Moet ik mijn eigen materiaal meebrengen?',
                'answer' => 'Ja, breng je eigen sportschoenen en sportkleding mee. Ballen worden door de club voorzien.',
                'order' => 2
            ]);


            Faq::create([
                'category_id' => $wedstrijden->id,
                'question' => 'Hoeveel wedstrijden spelen we per seizoen?',
                'answer' => 'We spelen ongeveer 20-25 wedstrijden per seizoen, meestal op zaterdag.',
                'order' => 1
            ]);
        }
}
