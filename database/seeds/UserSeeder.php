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
        // create user as admin
        $saveUser = User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@mail.com',
            'password' => bcrypt('secret')
        ]);

        UserRole::create([
            'user_id' => $saveUser->id,
            'role_id' => 1
        ]);

        // create user as team
        $saveTeam = User::create([
            'name' => 'Team',
            'email' => 'team@mail.com',
            'password' => bcrypt('secret')
        ]);

        UserRole::create([
            'user_id' => $saveTeam->id,
            'role_id' => 2
        ]);
    }
}
