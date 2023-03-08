<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Fruit;
use App\Mail\NewFruitsAdded;
use Illuminate\Support\Facades\Mail;

class GetFruitsFromAPI extends Command
{
    protected $signature = 'get:fruits';

    protected $description = 'Get fruits from https://fruityvice.com/ and save them into DB';

    public function handle()
    {
        $response = Http::get('https://fruityvice.com/api/fruit/all');

        $new_fruits = [];

        if ($response->ok()) {
            foreach ($response->json() as $fruit) {
                $existing_fruit = Fruit::where('name', $fruit['name'])->first();

                if (!$existing_fruit) {
                    Fruit::create([
                        'name' => $fruit['name'],
                        'family' => $fruit['family'],
                        'genus' => $fruit['genus'] ?? null,
                        'order' => $fruit['order'] ?? null,
                        'carbohydrates' => $fruit['nutritions']['carbohydrates'],
                        'protein' => $fruit['nutritions']['protein'],
                        'fat' => $fruit['nutritions']['fat'],
                        'calories' => $fruit['nutritions']['calories'],
                        'sugar' => $fruit['nutritions']['sugar'],
                    ]);

                    $new_fruits[] = $fruit;
                }
            }
        }

        if (!empty($new_fruits)) {
            Mail::to('test@gmail.com')->send(new NewFruitsAdded($new_fruits));
        }

        $this->info('Fruits saved successfully.');
    }
}