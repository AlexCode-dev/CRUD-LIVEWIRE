<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
        ];
    }
}
