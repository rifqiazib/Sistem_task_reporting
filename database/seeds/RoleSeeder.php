<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataRoles = ['Admin', 'Tim'];
        for($i = 0; $i < count($dataRoles); $i++) {
            Role::create([
                'name' => $dataRoles[$i]
            ]);
        }
    }
}