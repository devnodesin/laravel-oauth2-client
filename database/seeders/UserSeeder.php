<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        $admin = User::factory()->create([
            'email' => 'admin@domain.com',
            'password' => Hash::make('admin'), // Set the password to 'admin'
        ]);

        // Create regular users referencing admin
        User::factory(2)->create([
            'created_by' => $admin->id
        ]);
        */
    }
}
