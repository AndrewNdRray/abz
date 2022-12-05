<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use function Ramsey\Uuid\Generator\timestamp;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'), // password
            'remember_token' => Str::random(10),
            'type' => 'user',
            'surname' => $this->faker->lastName,
            'employment_date' => $this->faker->dateTimeBetween('-30 years', 'now', null),
            'phone_number' => $this->faker->phoneNumber,
            'position' => $this->faker->jobTitle,
            'salary_amount' => $this->faker->randomFloat('1', '500', '80000'),
            'photo' => $this->faker->image(null, 640, 480),
            'admin_created_id' => rand('1', '999'),
            'admin_updated_id' => rand('1', '999')
        ];
    }
}
