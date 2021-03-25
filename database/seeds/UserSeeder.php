<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $saveUser = User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@mail.com',
            'password' => bcrypt('secret')
        ]);

        UserRole::create([
            'user_id' => $saveUser->id,
            'role_id' => 1
        ]);
    }
}
