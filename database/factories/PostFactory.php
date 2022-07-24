<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::find($this->faker->numberBetween(1,10));        
        return [
            'title' => $this->faker->text(20),
            'body' => $this->faker->paragraph(),
            'user_id' => $user->id,
            'author' => $user->name
        ];
    }
}
