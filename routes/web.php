<?php

use App\Http\Controllers\LeaveApprovalLogController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group([
    'as' => 'user.',
    'prefix' => 'user/',
    'controller' => UserController::class,
    'middleware' => 'auth'
], function () {

    Route::get('edit/{user}', 'edit')
        ->name('edit');

    Route::patch('edit/{user}', 'update')
        ->name('update');

    Route::delete('{user}', 'destroy')
        ->name('destroy');


    Route::get('home/{user}', 'admin')
        ->name('home.admin');

        Route::get('/{user}', 'employee')
        ->name('employee');
});

Route::group([
    'as' => 'leave_type.',
    'prefix' => 'leave_type/',
    'controller' => LeaveTypeController::class,
    'middleware' => 'auth'
], function () {

    Route::get('/', 'index')
        ->name('index');

    Route::get('create', 'create')
        ->name('create');

    Route::post('/', 'store')
        ->name('store');

    Route::get('edit/{leave_type}', 'edit')
        ->name('edit');

    Route::patch('edit/{leave_type}', 'update')
        ->name('update');

    Route::delete('{leave_type}', 'destroy')
        ->name('destroy');
});


Route::group([
    'as' => 'log.',
    'prefix' => 'log/',
    'controller' => LeaveApprovalLogController::class,
    'middleware' => ['admin', 'auth']
], function () {

    Route::get('/', 'index')
        ->name('index');
});


Route::group([
    'as' => 'leave_request.',
    'prefix' => 'leave_request/',
    'controller' => LeaveRequestController::class,
    'middleware' => 'auth'
], function () {

    Route::get('/', 'index')
        ->name('index');

    Route::get('create', 'create')
        ->name('create');

    Route::post('/', 'store')
        ->name('store');

    Route::patch('reject/{leave_request}', 'reject')
        ->name('reject');

    Route::patch('approve/{leave_request}', 'approve')
        ->name('approve');

    Route::delete('{leave_request}', 'destroy')
        ->name('destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
