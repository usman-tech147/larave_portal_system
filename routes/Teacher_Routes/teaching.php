<?php

Route::group(['namespace' => 'Teacher', 'middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {

        Route::get('/fill/report', 'TeacherController@teachingTabs')->name('teaching.tabs')->middleware('disable_links');
        //teaching routes
//         2.1: course detail routes
        Route::resource('/teaching/course_detail', 'Teaching\CourseDetailController')->middleware('disable_links');
        Route::get('/all/courses/details', 'Teaching\CourseDetailController@getCoursesDetail')->name('all.courses.details');
        // 2.1: course detail routes
        // 2.3: course assessments routes
        Route::resource('/teaching/course_assessments', 'Teaching\CourseAssessmentController')->middleware('disable_links');
        Route::get('/all/courses/assessments', 'Teaching\CourseAssessmentController@getCoursesAssessments')->name('all.courses.assessments');
        // 2.3: course assessments routes
        //teaching routes

    });
});