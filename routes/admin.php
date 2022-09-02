<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VacancyController;
use App\Models\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::resource('vacancies',VacancyController::class);
Route::resource('positions',PositionController::class);

Route::get('positions/{id}/json',[PositionController::class,'position']);
Route::post('vacancies/{id}/change_status',[VacancyController::class,'changeStatus']);
Route::prefix('applications')->name('applications.')->group(function(){
    Route::get('cvdeck',[ApplicationController::class,'cvdeck'])->name('cvdeck');
    Route::get('screening',[ApplicationController::class,'screening'])->name('screening');
    Route::get('interview',[ApplicationController::class,'interview'])->name('interview');
    Route::get('shortlisted',[ApplicationController::class,'shortlisted'])->name('shortlisted');
    Route::get('offer',[ApplicationController::class,'offer'])->name('offer');
    Route::get('hire',[ApplicationController::class,'hire'])->name('hire');
    Route::get('reject',[ApplicationController::class,'reject'])->name('reject');
    Route::get('{applicant}/{status}',[ApplicationController::class,'applicantStatus'])->name('change_status');

    // for ajax
    Route::get('{id}',[ApplicationController::class,'show']);
});
