<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('categories', App\Http\Controllers\CategorieController::class);


Route::resource('scholarships', App\Http\Controllers\ScholarshipController::class);


Route::resource('profiles', App\Http\Controllers\ProfileController::class);

// grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});


Route::resource('workshops', App\Http\Controllers\WorkshopController::class);

Route::resource('activities', App\Http\Controllers\ActivitieController::class);
Route::resource('actcheckins', App\Http\Controllers\ActcheckinController::class);


Route::resource('userWorkshops', App\Http\Controllers\user_workshopController::class);

Route::get('reportes', [App\Http\Controllers\WorkshopController::class,'lista'])->name('reportes');


Route::resource('sessions', App\Http\Controllers\SessionController::class);

Route::get('/addsessions/{id}', [App\Http\Controllers\SessionController::class,'addsession'])->name('addsessions');
Route::get('/sessionlist/{id}', [App\Http\Controllers\SessionController::class,'sessionlist'])->name('sessionlist');



Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar');
Route::get('/eventos/get', [App\Http\Controllers\CalendarController::class, 'get_session']);
Route::get('/calendar/create', [App\Http\Controllers\CalendarController::class, 'create_session']);
Route::get('/calendar/edit', [App\Http\Controllers\CalendarController::class, 'ajaxupdate']);