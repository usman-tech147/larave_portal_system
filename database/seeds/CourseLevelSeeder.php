<?php

use Illuminate\Database\Seeder;
use App\Models\Hr\CourseLevel;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name' => 'undergraduate',
            ],
            [
                'name' => 'masters',
            ],
            [
                'name' => 'phd',
            ]
        ];

        foreach ($levels as $level) {
            CourseLevel::create($level);
        }
    }
}
