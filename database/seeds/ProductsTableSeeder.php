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
        Product::create([
            'name' => 'Xiaomi Note 5',
            'slug' => 'xiaomi-note-5',
            'details' => '5 inch, 16 GB, 4GB RAM',
            'price' => 15611,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);


        Product::create([
            'name' => 'Samsung Note 8',
            'slug' => 'samsung-note-8',
            'details' => '6 inch, 64 GB, 4GB RAM',
            'price' => 78588,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);



        Product::create([
            'name' => 'Iphone 5 S',
            'slug' => 'ihopne-5-s',
            'details' => '5 inch, 32 GB, 3GB RAM',
            'price' => 15611,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);



        Product::create([
            'name' => 'huawei 6',
            'slug' => 'huavei-6',
            'details' => '4 inch, 16 GB, 2GB RAM',
            'price' => 58628,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);




        Product::create([
            'name' => 'Lenovo K 5 Play',
            'slug' => 'lenovo-k-5-play',
            'details' => '4.5 inch, 16 GB, 2GB RAM',
            'price' => 8595,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);



        Product::create([
            'name' => 'Meiuzu 5',
            'slug' => 'meiuzu-5',
            'details' => '4 inch, 16 GB, 1GB RAM',
            'price' => 15611,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
                            standard dummy text ever since the 1500'
        ]);

    }
}
