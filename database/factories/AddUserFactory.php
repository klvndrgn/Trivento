<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => 'username',
            'email' => '2031139.handyca.uib.edu',
            'address' => 'Batam Center',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
            'isTrue' => true
        ];
    }
}
