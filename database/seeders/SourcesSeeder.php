<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'link' => str_slug($faker->sentence(1)),
                'description' => $faker->text(120),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $data;
    }
}
