<?php

use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subcategories::create([
            'name'=>'red apple',
            'name_ar'=>'تفاح احمر',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'description_ar'=>'ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص',
        ]);
        \App\Subcategories::create([
            'name'=>'green apple',
            'name_ar'=>'تفاح اخضر',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'description_ar'=>'ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص',
        ]);
        \App\Subcategories::create([
            'name'=>'yellow apple',
            'name_ar'=>'تفاح اصفر',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'description_ar'=>'ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص',
        ]);
    }
}
