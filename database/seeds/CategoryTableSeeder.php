<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
            ['name' => 'Xiaomis', 'description' => 'best', 'slug' => 'xiaomis', 'status' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lenovos', 'description' => 'better', 'slug' => 'lenovos', 'status' => '2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Samsungs', 'description' => 'good', 'slug' => 'samsungs', 'status' => '3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Iphones', 'description' => 'poor', 'slug' => 'iphones', 'status' => '4', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
