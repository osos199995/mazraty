<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Categories::create([
            'name'=>'vegetables',
            'name_ar'=>'خضروات',
            'image'=>'dsad.jpg',
        ]);
        \App\Categories::create([
            'name'=>'fruits',
            'name_ar'=>'فواكه',
            'image'=>'dsad.jpg',
        ]);


    }
}
