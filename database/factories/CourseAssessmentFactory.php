<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Teaching\CourseAssessment;
use Faker\Generator as Faker;

$factory->define(CourseAssessment::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'course_level' => 'level 1',
        'program' => 'program 2',
        'course_title' => 'title 3',
        'course_code' => 'code 3',
        'semester' => 'semester 4',
        'final_result_submission' => 'on time',
        'moodle_usage_status' => 'average',
    ];

});
