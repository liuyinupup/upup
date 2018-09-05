<?php

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
        factory(\App\Category::class, 8)->create();
        $category=\App\Category::find(1);
        $category->pid=0;
        $category->order=1;
        $category->name="数学";
        $category->save();
        $category=\App\Category::find(2);
        $category->pid=0;
        $category->order=2;
        $category->name="语文";
        $category->save();
        $category=\App\Category::find(3);
        $category->pid=0;
        $category->order=3;
        $category->name="英语";
        $category->save();
        $category=\App\Category::find(4);
        $category->pid=0;
        $category->order=4;
        $category->name="物理";
        $category->save();
        $category=\App\Category::find(5);
        $category->pid=1;
        $category->order=1;
        $category->name="数学1";
        $category->save();
        $category=\App\Category::find(6);
        $category->pid=1;
        $category->order=2;
        $category->name="数学2";
        $category->save();
        $category=\App\Category::find(7);
        $category->pid=2;
        $category->order=1;
        $category->name="语文1";
        $category->save();
        $category=\App\Category::find(8);
        $category->pid=2;
        $category->order=1;
        $category->name="语文2";
        $category->save();
        //
    }
}
