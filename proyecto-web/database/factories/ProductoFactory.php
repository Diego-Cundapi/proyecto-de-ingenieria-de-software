<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //en los factories no ponemos llaves foraneas, solo en el seeder
            'name' =>  fake()->word(),
            'descripcion' =>  fake()->sentence(),
            'modelo' =>  fake()->sentence(),
            'marca' =>  fake()->word(),
            'clave' =>  fake()->word(),
            'price' =>  fake()->randomFloat(2, 0, 9999),
            'image' =>  fake()->imageUrl(),
        ];
    }
}
