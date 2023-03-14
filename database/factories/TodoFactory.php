<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TodoGroup;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'taskname' => $this->faker->firstname(),
            'taskdescription' => $this->faker->text(),
            'user_id' => User::inRandomOrder()->first()->id,
            'todo_group_id' => TodoGroup::inRandomOrder()->first()->id,
        ];
    }
}
