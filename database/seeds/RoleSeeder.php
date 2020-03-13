<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'hr',
            ],
            [
                'name' => 'dean',
            ],
            [
                'name' => 'teacher',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
