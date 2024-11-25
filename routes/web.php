<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(\App\Http\Middleware\AdminMiddleware::class);

Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard')->middleware('auth');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update')->middleware('auth');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('contacts', [ContactController::class, 'create'])->name('contacts');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('leads',[LeadsController::class, 'create'])->name('leads');
    Route::get('leads/index',[LeadsController::class, 'index'])->name('leads.index');
    Route::post('leads/store',[LeadsController::class, 'store'])->name('leads.store');
    Route::get('leads/{id}/edit' , [LeadsController::class , 'edit'])->name('leads.edit');
    Route::put('/leads/{id}', [LeadsController::class, 'update'])->name('leads.update');
    Route::delete('/leads/{id}', [LeadsController::class, 'destroy'])->name('leads.destroy');
    Route::get('tasks' , [TaskController::class , 'index'])->name('tasks.index');
    Route::get('tasks/create' , [TaskController::class, 'create'])->name('tasks.create');
    Route::post('tasks/store',[TaskController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{id}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{id}', [TaskController::class, 'destory'])->name('tasks.destory');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::resource('contacts', ContactController::class);
});


