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

Route::get('/', function () {
    return view('login');
});

Route::get ('password/lost','ForgotPasswordController@forgotPassword');

Auth::routes();
Route::get ('dashboard', 'DashboardController@index');
Route::get ('changepassword', 'UserController@changepassword');
Route::post('updatepassword','UserController@updatePassword');
Route::get ('profile', 'UserController@profile');
Route::resource ('pages', 'PagesController');
Route::post ('update/{user_id}', 'UserController@updateprofile');
Route::post('changePassword/{user_id}','UserController@updatePassword')->name('changePassword');
Route::get ('user/profile', 'UserController@profile');
Route::get ('main/logout', 'MainController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function () {

    Route::get('/', function () {

        $senarai_users = [
            ['id' => 1, 'name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'active'],
            ['id' => 2, 'name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'banned'],
            ['id' => 3, 'name' => 'Ah Leong', 'email' => 'ahleong@gmail.com', 'status' => 'active'],
        ];

        return view('users.senarai_userlist', compact('senarai_users'));
    });
    // Route untuk paparkan borang tambah user
Route::get('/create', function () {
    return 'Ini adalah halaman borang tambah user baru';
});
// Route untuk paparkan borang tambah user
Route::get('/{id}/edit', function ($id) {
    return 'Ini adalah halaman borang edit user bernombor ID: ' .$id;
})->where(['id' => '[0-9]+']);


});
