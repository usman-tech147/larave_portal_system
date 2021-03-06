<?php

Route::group(['namespace' => 'HR', 'middleware' => 'role:hr'], function () {
    Route::prefix('/teacher/evaluation/portal/hr')->group(function () {
// school routes
        Route::resource('/manage-program/school', 'ManageProgram\SchoolController');
        Route::get('/all/schools/', 'ManageProgram\SchoolController@getAllSchools')->name('all.schools');
// school routes
// department routes
        Route::resource('/manage-program/department', 'ManageProgram\DepartmentController');
        Route::get('/all/departments/', 'ManageProgram\DepartmentController@getAllDepartments')->name('all.departments');
        Route::get('/all/departments/schools', 'ManageProgram\DepartmentController@getSchools')->name('get.departments.schools');
// department routes
//user routes
        Route::resource('users', 'UserController');
        Route::get('users/schools/{id}/departments/', 'UserController@getDepartments')->name('user.departments');
//user routes
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');

    });
});