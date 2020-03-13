<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Teacher\Teaching\CourseDetail;
use Faker\Generator as Faker;
use App\User;

$factory->define(CourseDetail::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'course_level' => 'level 1',
        'program' => 'program 2',
        'course_title' => 'title 3',
        'course_code' => 'code 3',
        'semester' => 'semester 4',
        'assessments' => $faker->numberBetween($min = 1,$max = 5),
        'makeup_classes' => $faker->numberBetween($min = 1,$max = 3),
        'student_feedback' => $faker->numberBetween($min = 30,$max = 100),
    ];

});
