<?php

namespace Database\Factories;
use App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' =>$this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstName,
            'last_name' =>$this->faker->lastName,
            'gender' => $this->faker->randomElement(['男性','女性']),
            'email'=> $this->faker->unique()->safeEmail(),
            'tel1' => '090',
            'tel2' => $this->faker->numberBetween(1000, 9999),
            'tel3' => $this->faker->numberBetween(1000, 9999),
            'address'=>$this->faker->address,
            'building' =>$this->faker->secondaryAddress,
            'message' =>$this->faker->text
        ];
    }
}
