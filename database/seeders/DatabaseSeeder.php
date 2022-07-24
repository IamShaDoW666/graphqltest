<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;
class DatabaseSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run()
    {                
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(50)->create()->each(function($q) {
            $configs = [
                'views' => $this->faker->numberBetween(0,2893),
                'customIcon' => $this->faker->word() . '.jpg',
                'likes' => $this->faker->numberBetween(0,10000),
                'comments' => $this->faker->numberBetween(0, 1000002),
                'foo' => 'bar'
            ];
            $q->setMultipleConfigs($configs);
        });
    }
}
