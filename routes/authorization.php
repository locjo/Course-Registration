<?php


use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'lecturer'])->prefix('lecturer')->name('lecturer.')->group(function (){
    Route::get('dashboard',[LecturerController::class, 'index'])
        ->name('dashboard');
});
