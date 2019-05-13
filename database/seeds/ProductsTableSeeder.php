<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++){
            Product::create([
                'name' => 'Xiaomi ' . $i,
                'slug' => 'xiaomi-' . $i,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500'
            ])->categories()->attach(1);
        }  

        
        $product = Product::find(1);
        $product->categories()->attach(3);

        for ($i = 1; $i < 11; $i++){
            Product::create([
                'name' => 'Lenovo ' . $i,
                'slug' => 'lenovo-' . $i,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500'
            ])->categories()->attach(2);
        }  


        for ($i = 1; $i < 11; $i++){
            Product::create([
                'name' => 'Samsung ' . $i,
                'slug' => 'samsung-' . $i,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500'
            ])->categories()->attach(3);
        }  


        for ($i = 1; $i < 11; $i++){
            Product::create([
                'name' => 'Iphone ' . $i,
                'slug' => 'iphone-' . $i,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(200, 300),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500'
            ])->categories()->attach(4);
        }
        
    }
}
