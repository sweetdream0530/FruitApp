<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use APP\Models\Fruit;
use APP\Mail\NewFruitsAdded;

class GetFruits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-fruits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://fruityvice.com/api/fruit/all';

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url);

        $fruits = json_decode($response->getBody()->getContents(), true);

        foreach ($fruits as $fruit) {
            Fruit::updateOrCreate(
                ['name' => $fruit['name']],
                [
                    'name' => $fruit['name'],
                    'family' => $fruit['family'],
                    'genus' => $fruit['genus'],
                    'order' => $fruit['order'],
                    'carbohydrates' => $fruit['nutritions']['carbohydrates'],
                    'protein' => $fruit['nutritions']['protein'],
                    'fat' => $fruit['nutritions']['fat'],
                    'calories' => $fruit['nutritions']['calories'],
                    'sugar' => $fruit['nutritions']['sugar']
                ]
            );
        }

        $admin_email = 'test@gmail.com';

        $new_fruits = Fruit::where('created_at', '>=', now()->subDay())->get();

        if ($new_fruits->count() > 0) {
            Mail::to($admin_email)->send(new NewFruitsAdded($new_fruits));
        }
    }
}
