<?php

namespace Database\Seeders;

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
        \DB::table('news')->insert($this->getData());
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
