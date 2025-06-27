<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@email.com',
            'role' => 'client',
            'password' => \Hash::make('1234')
        ]);

        Category::factory(5)->create()->each(function ($category) {
            Product::factory(rand(3, 7))->make()->each(function ($product) use ($category) {
                $product->category_id = $category->id;
                $product->slug = \Str::slug($product->name);

                $originalSlug = $product->slug;
                $counter = 1;
                while (Product::where('slug', $product->slug)->exists()) {
                    $product->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $imageName = uniqid('product_') . '.jpg';
                $sourcePath = storage_path('app/public/products/default.jpg');
                $destPath = storage_path('app/public/products/' . $imageName);
                if (file_exists($sourcePath)) {
                    copy($sourcePath, $destPath);
                    $product->image = 'products/' . $imageName;
                } else {
                    $product->image = null;
                }

                $product->save();
            });
        });
    }
}
