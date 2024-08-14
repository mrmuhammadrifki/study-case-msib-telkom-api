<?php

namespace Database\Factories;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    /**
     * Nama model yang terhubung dengan factory ini.
     *
     * @var string
     */
    protected $model = Conversation::class;

    /**
     * Definisikan model default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'direction' => $this->faker->randomElement(['incoming', 'outgoing']),
            'sender' => $this->faker->word,
        ];
    }
}
