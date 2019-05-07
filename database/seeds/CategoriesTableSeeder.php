<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Xiaomis',  'slug' => 'xiaomis',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lenovos',  'slug' => 'lenovos',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Samsungs', 'slug' => 'samsungs', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Iphones',  'slug' => 'iphones',  'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
