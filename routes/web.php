<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LecturerDashboardController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionClassController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about-us', function () {
    return view('about-us');
})->middleware(['auth', 'verified'])->name('about-us');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
});
require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('departments', DepartmentController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('classes', ClassController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('students', StudentController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('lecturers', LecturerController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('notifications', NotificationsController::class);
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('section_classes', SectionClassController::class);
});

Route::prefix('lecturer')->middleware('lecturer')->group(function(){
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('lecturer.dashboard');
});

Route::prefix('lecturer')->name('lecturer.')->group(function () {

    Route::resource('sessions', SessionController::class);
    Route::get('/attendances/index/{session}', [AttendanceController::class,'index'])
        ->name('attendances.index');
    Route::post('/attendances/store', [AttendanceController::class,'store'])
        ->name('attendances.store');

});

Route::prefix('lecturer')->name('lecturer.')->group(function(){

    Route::resource('exams', ExamController::class);

    Route::resource('exams.questions', QuestionController::class);

    
});


Route::prefix('student')->name('student.')->group(function(){

    Route::resource('enrollments', EnrollmentController::class);

    
});
