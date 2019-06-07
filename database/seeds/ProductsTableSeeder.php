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
                'category_id' => 1,
                'name' => 'Xiaomi ' . $i,
                'slug' => 'xiaomi-' . $i,
                'code' => $i,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500',
                'operating_system' => 'Android'
            ])->categories()->attach(1);
        }  

        
        $product = Product::find(1);
        $product->categories()->attach(3);

        for ($i = 1; $i < 11; $i++){
            Product::create([
                'category_id' => 2,
                'name' => 'Lenovo ' . $i,
                'slug' => 'lenovo-' . $i,
                'code' => $i + 11,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500',
                'operating_system' => 'Windows Phone'
            ])->categories()->attach(2);
        }  


        for ($i = 1; $i < 11; $i++){
            Product::create([
                'category_id' => 3,
                'name' => 'Samsung ' . $i,
                'slug' => 'samsung-' . $i,
                'code' => $i + 22,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(20000, 30000),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500',
                'operating_system' => 'Bleckgerry ios'
            ])->categories()->attach(3);
        }  


        for ($i = 1; $i < 11; $i++){
            Product::create([
                'category_id' => 4,
                'name' => 'Iphone ' . $i,
                'slug' => 'iphone-' . $i,
                'code' => $i + 33,
                'details' => [4, 5, 6][array_rand([4, 5, 6])] . ' inch, ' . [16, 32, 64][array_rand([16, 32, 64])] . ' GB, 1080 GHz',
                'price' => rand(200, 300),
                'description' => 'Lorem Ipsum ' . $i . ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                                    standard dummy text ever since the 1500',
                'operating_system' => 'Ios'
            ])->categories()->attach(4);
        }
        
    }
}
