<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->words(asText:true),
            'content' => fake()->text(),
        ];
    }

    /**
     * 公開確認済み
     *
     * @param boolean $confirmed
     * @return static
     */
    public function confirmed(bool $confirmed = true)
    {
        return $this->state(compact('confirmed'));
    }
}
