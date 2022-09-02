<?php

use App\Http\Controllers\JobListController;
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

Route::get('/', [JobListController::class,'index'])->name('job_list.index');
Route::post('/job_list/{vacancy}/apply', [JobListController::class,'apply'])->name('job_list.apply');
Route::get('job_list/{id}/details',[JobListController::class,'details'])->name('job_list.details');
Auth::routes();

