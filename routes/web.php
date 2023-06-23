<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return redirect()->route("dashboard");
});

Route::get('/dashboard', "App\Http\Controllers\FormController@view")->middleware(['auth'])->name('dashboard');

Route::post('/submit', "App\Http\Controllers\FormController@auto_submit_participants")->middleware(['auth'])->name('auto.submit.participants');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get("/upload_priests", "App\Http\Controllers\MiscController@upload_priests")->middleware(['auth'])->name('misc.upload.priests');

require __DIR__.'/auth.php';
