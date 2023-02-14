<?php
use App\Http\Controllers\SkillController;
use App\Http\Controllers\HerosController;
use Illuminate\Support\Facades\Route;

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

//Notre nouvelle page contact
Route::get('/contact', function () {
    return view('contact');
    });

    Route::resource('heros', HerosController::class);

    Route::resource('skills', SkillController::class);