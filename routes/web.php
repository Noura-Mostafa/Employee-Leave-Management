<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resources([

        '/employees' => EmployeeController::class,
        '/leave-types' => LeaveTypeController::class,
    ]);

    Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('requests.index');
    Route::put('leave-requests/{leave_request}', [LeaveRequestController::class, 'approve'])->name('requests.approve');
    Route::patch('leave-requests/{leave_request}', [LeaveRequestController::class, 'deny'])->name('requests.deny');
});

Route::middleware(['auth', 'role:employee'])->group(function () {

    Route::get('/employee-leave-requests', [LeaveRequestController::class, 'employee'])->name('requests.employee');
    Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->name('requests.create');
    Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->name('requests.store');
    Route::get('/leave-requests/{leave_request}', [LeaveRequestController::class, 'show'])->name('requests.show');
    Route::delete('/leave-requests/{leave_request}', [LeaveRequestController::class, 'destroy'])->name('requests.destroy');
});


require __DIR__ . '/auth.php';
