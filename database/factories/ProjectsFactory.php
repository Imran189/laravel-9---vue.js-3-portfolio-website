<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>'Modern Web Portfolio',
            'description'=>'Web Adaptable for al device',
            'link'=>'https://github.com/Imran189',
            'photo'=>'avatar.png'
        ];
    }
}
