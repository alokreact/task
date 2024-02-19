<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Appointment;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->dateTimeBetween('+1 day', '+1 week');
        $endTime = Carbon::parse($startTime)->addHours(1); 
        
        return [
            'start_time' => $startTime,
            'end_time' => $endTime,
            'date' => Carbon::parse($startTime)->format('Y-m-d'),
            'user_id' => User::factory(),
        ];
    }
}
