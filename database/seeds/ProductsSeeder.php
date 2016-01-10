<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample category
        $shoes = Category::create(['title' => 'Shoes']);
        $shoes->childs()->saveMany([
            new Category(['title' => 'Lifestyle']),
            new Category(['title' => 'Running']),
            new Category(['title' => 'Basketball']),
            new Category(['title' => 'Football'])
        ]);

        $clothing = Category::create(['title' => 'Clothing']);
        $clothing->childs()->saveMany([
            new Category(['title' => 'Jackets']),
            new Category(['title' => 'Hoodies']),
            new Category(['title' => 'Vests']),
        ]);

        // sample product
        $running = Category::where('title', 'Running')->first();
        $lifestyle = Category::where('title', 'Lifestyle')->first();
        $shoe1 = Product::create(['name' => 'Nike Air Force', 'model' => 'Men\'s Shoe', 'photo'=>'stub-shoe.jpg']);
        $shoe2 = Product::create(['name' => 'Nike Air Max', 'model' => 'Women\'s Shoe', 'photo'=>'stub-shoe.jpg']);
        $shoe3 = Product::create(['name' => 'Nike Air Zoom', 'model' => 'Women\'s Shoe', 'photo'=>'stub-shoe.jpg']);
        $running->products()->saveMany([$shoe1, $shoe2, $shoe3]);
        $lifestyle->products()->saveMany([$shoe1, $shoe2]);

        $jacket = Category::where('title', 'Jackets')->first();
        $vest = Category::where('title', 'Vests')->first();
        $jacket1 = Product::create(['name' => 'Nike Aeroloft Bomber', 'model' => 'Women\'s Jacket', 'photo'=>'stub-jacket.jpg']);
        $jacket2 = Product::create(['name' => 'Nike Guild 550', 'model' => 'Men\'s Jacket', 'photo'=>'stub-jacket.jpg']);
        $jacket3 = Product::create(['name' => 'Nike SB Steele', 'model' => 'Men\'s Jacket', 'photo'=>'stub-jacket.jpg']);
        $jacket->products()->saveMany([$jacket1, $jacket3]);
        $vest->products()->saveMany([$jacket2, $jacket3]);
    }
}
