<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeliculaFactory extends Factory
{
    protected $model = Pelicula::class;

    public function definition()
    {
        return [
			'titulo' => $this->faker->name,
			'duracion' => $this->faker->name,
			'sinopsis' => $this->faker->name,
			'imagen' => $this->faker->image('public/storage/imagenes',200,200,null,true), //public/storage/imagenes/image1.
			'actor_id' => $this->faker->name,
        ];
    }
}
