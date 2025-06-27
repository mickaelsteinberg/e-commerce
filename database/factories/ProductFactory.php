<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $products = [
            'Chaise de bureau',
            'Écran 24"',
            'Clavier mécanique',
            'Ordinateur portable',
            'Imprimante laser',
            'Table de réunion',
            'Lampe LED',
            'Casque audio'
        ];
        $name = $this->faker->randomElement($products);
        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'name' => $name,
            'slug' => \Str::slug($name),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000)
        ];
    }
}
