<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;

class AppointmentTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_can_create_appointment(){

        $appointmentData = [
            'start_time' => now(),
            'end_time' => now()->addHour(),
            'date'=> today(),
            'user_id'=>3,
        ];

        $appointment = Appointment::create($appointmentData);

        $this->assertInstanceOf(Appointment::class, $appointment);
  
        $this->assertInstanceOf(Carbon::class, $appointment->start_time);
        $this->assertInstanceOf(Carbon::class, $appointment->end_time);
    }

    public function test_a_user_can_create_appointment(){

        $user = User::factory()->create();
        $this->actingAs($user);
        $data = ['start_time'=> now(), 'end_time'=>now()->addHour(),'date'=>today(),'user_id'=>$user->id];
        $appointment = Appointment::create($data);
        $this->assertInstanceOf(Appointment::class, $appointment);

    }
}
