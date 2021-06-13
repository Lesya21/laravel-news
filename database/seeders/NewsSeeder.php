<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \DB::table('news')->insert($this->getData());

        /*
        $news = News::create([
            'title'  =>  'Новость с категориями',
            'author' =>  'Наталья М',
            'description' => 'Описание новости',
            'detail_text' => 'Детальный текст'
        ]);
        */

        for($i = 1; $i < 11; $i++) {
            $news = News::find($i);
            $categories = Category::find([mt_rand(1, 2), mt_rand(3, 5)]);
            $news->categories()->attach($categories);
        }
    }

    private function getData()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(1),
                'code' => str_slug($faker->sentence(1)),
                'description' => $faker->text(120),
                'detail_text' => $faker->text(300),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $data;
    }
}
