<?php

use Illuminate\Database\Seeder;
use App\Models\Hr\ManageProgram\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'school_id' => 1,
                'name' => 'department of software',
            ],
            [
                'school_id' => 2,
                'name' => 'department of psychology',
            ],
            [
                'school_id' => 1,
                'name' => 'department of computer and science',
            ],
            [
                'school_id' => 3,
                'name' => 'department of accounting',
            ],
            [
                'school_id' => 1,
                'name' => 'department of information and tech',
            ],
            [
                'school_id' => 3,
                'name' => 'department of finance',
            ],
            [
                'school_id' => 2,
                'name' => 'department of emergency',
            ],
            [
                'school_id' => 4,
                'name' => 'department of aviation',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
