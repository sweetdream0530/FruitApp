<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;

class FruitController extends Controller
{
    public function index(Request $request)
    {
        $fruits = Fruit::paginate(10);

        return view('fruits.index', compact('fruits'));
    }
    public function filter(Request $request)
    {
        $query = Fruit::query();

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->has('family')) {
            $query->where('family', 'LIKE', '%' . $request->input('family') . '%');
        }

        $fruits = $query->paginate(10);

        return view('fruits.index', compact('fruits'));
    }

    public function favorites(Request $request)
    {
        $favorite_fruits = $request->session()->get('favorite_fruits', []);

        $fruits = Fruit::whereIn('id', $favorite_fruits)->get();

        $total_nutrition = [
            'carbohydrates' => 0,
            'protein' => 0,
            'fat' => 0,
            'calories' => 0,
            'sugar' => 0,
        ];

        foreach ($fruits as $fruit) {
            $total_nutrition['carbohydrates'] += $fruit->carbohydrates;
            $total_nutrition['protein'] += $fruit->protein;
            $total_nutrition['fat'] += $fruit->fat;
            $total_nutrition['calories'] += $fruit->calories;
            $total_nutrition['sugar'] += $fruit->sugar;
        }

        return view('fruits.favorites', compact('fruits', 'total_nutrition'));
    }

    public function favorite(Request $request, Fruit $fruit)
    {
        $favorite_fruits = $request->session()->get('favorite_fruits', []);

        if (!in_array($fruit->id, $favorite_fruits)) {
            $favorite_fruits[] = $fruit->id;

            $request->session()->put('favorite_fruits', $favorite_fruits);
        }

        return redirect()->route('fruits.index');
    }

    public function unfavorite(Request $request, Fruit $fruit)
    {
        $favorite_fruits = $request->session()->get('favorite_fruits', []);

        if (in_array($fruit->id, $favorite_fruits)) {
            $key = array_search($fruit->id, $favorite_fruits);

            unset($favorite_fruits[$key]);

            $request->session()->put('favorite_fruits', $favorite_fruits);
        }
        return redirect()->route('fruits.index');
    }
}
