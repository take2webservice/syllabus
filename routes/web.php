<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
Route::resource('schools', 'SchoolController');
Route::resource('departments', 'DepartmentController');
Route::resource('lessons', 'LessonController');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::prefix('staff')->name('staff::')->group(function() {
    Route::get('login', 'Staff\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Staff\Auth\LoginController@login');
    Route::post('logout', 'Staff\Auth\LoginController@logout')->name('logout');
    Route::get('register', 'Staff\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Staff\Auth\RegisterController@register');
    
    Route::get('password/reset', 'Staff\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Staff\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Staff\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Staff\Auth\ResetPasswordController@reset');

    Route::get('/', 'StaffsController@index');
    Route::get('/home', 'StaffsController@index');
});

Route::prefix('teacher')->name('teacher::')->group(function() {
    Route::get('login', 'Teacher\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Teacher\Auth\LoginController@login');
    Route::post('logout', 'Teacher\Auth\LoginController@logout')->name('logout');
    Route::get('register', 'Teacher\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Teacher\Auth\RegisterController@register');
    
    Route::get('password/reset', 'Teacher\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Teacher\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Teacher\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Teacher\Auth\ResetPasswordController@reset');

    Route::get('/', 'TeachersController@index');
    Route::get('/home', 'TeachersController@index');
});
