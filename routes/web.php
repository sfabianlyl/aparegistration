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

// Route::view('/', "deadline")->name('registration.end');
// Route::redirect('/dashboard', "/");
// Route::redirect('/login', "/");


// Route::get('/', function () {
//     return redirect()->route("dashboard");
// });

// Route::get('/dashboard', "App\Http\Controllers\FormController@view")->middleware(['auth'])->name('dashboard');
// Route::post('/submit', "App\Http\Controllers\FormController@auto_submit_participants")->middleware(['auth'])->name('auto.submit.participants');

Route::view('/', "dashboard-mock")->name('dashboard');
Route::post('/submit', "App\Http\Controllers\FormController@mock_auto_submit_participants")->name('auto.submit.participants');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get("/registration_status", "App\Http\Controllers\MiscController@registration_status_view")->middleware(['auth'])->name('registration.status.view');
});

// Route::get("/upload_priests", "App\Http\Controllers\MiscController@upload_priests")->middleware(['auth'])->name('misc.upload.priests');

// require __DIR__.'/auth.php';
