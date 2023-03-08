<?php

namespace Tests\Feature;

use App\Models\Fruit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FruitTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_displays_fruits()
    {
        $fruits = Fruit::factory()->count(10)->create();

        $response = $this->get('/fruits');

        $response->assertStatus(200);

        foreach ($fruits as $fruit) {
            $response->assertSee($fruit->name);
        }
    }

    public function test_filter_fruits_by_name()
    {
        $fruit1 = Fruit::factory()->create(['name' => 'Apple']);
        $fruit2 = Fruit::factory()->create(['name' => 'Banana']);
        $fruit3 = Fruit::factory()->create(['name' => 'Orange']);

        $response = $this->get('/fruits/filter?name=banana');

        $response->assertStatus(200)
            ->assertSee($fruit2->name)
            ->assertDontSee($fruit1->name)
            ->assertDontSee($fruit3->name);
    }

    public function test_filter_fruits_by_family()
    {
        $fruit1 = Fruit::factory()->create(['family' => 'Rosaceae']);
        $fruit2 = Fruit::factory()->create(['family' => 'Musaceae']);
        $fruit3 = Fruit::factory()->create(['family' => 'Rutaceae']);

        $response = $this->get('/fruits/filter?family=rosaceae');

        $response->assertStatus(200)
            ->assertSee($fruit1->name)
            ->assertDontSee($fruit2->name)
            ->assertDontSee($fruit3->name);
    }

    public function test_add_fruit_to_favorites()
    {
        $fruit = Fruit::factory()->create();

        $response = $this->post(route('fruits.favorite', $fruit));

        $response->assertStatus(302)
            ->assertRedirect(route('fruits.index'));

        $this->assertContains($fruit->id, session('favorite_fruits', []));
    }

    public function test_remove_fruit_from_favorites()
    {
        $fruit = Fruit::factory()->create();

        $this->post(route('fruits.favorite', $fruit));

        $response = $this->delete(route('fruits.unfavorite', $fruit));

        $response->assertStatus(302)
            ->assertRedirect(route('fruits.index'));

        $this->assertNotContains($fruit->id, session('favorite_fruits', []));
    }
}