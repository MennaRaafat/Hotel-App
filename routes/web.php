<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/roomType', [App\Http\Controllers\RoomTypeController::class, 'index'])->name('roomTypeIndex');
Route::get('/admin/roomType/add', [App\Http\Controllers\RoomTypeController::class, 'create'])->name('roomTypeCreate');
Route::post('/admin/roomType/store', [App\Http\Controllers\RoomTypeController::class, 'store'])->name('roomTypeStore');
Route::get('/admin/roomType/{id}', [App\Http\Controllers\RoomTypeController::class, 'show'])->name('roomTypeShow');


Route::get('/admin/room', [App\Http\Controllers\RoomController::class, 'index'])->name('roomIndex');
Route::get('/admin/room/add', [App\Http\Controllers\RoomController::class, 'create'])->name('roomCreate');
Route::post('/admin/room/store', [App\Http\Controllers\RoomController::class, 'store'])->name('roomStore');


Route::get('/admin/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departmentIndex');
Route::get('/admin/department/add', [App\Http\Controllers\DepartmentController::class, 'create'])->name('departmentCreate');
Route::post('/admin/department/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('departmentStore');


Route::get('/admin/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staffIndex');
Route::get('/admin/staff/add', [App\Http\Controllers\StaffController::class, 'create'])->name('staffCreate');
Route::post('/admin/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staffStore');


Route::get('/admin/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('bookingIndex');
Route::get('/booking/add', [App\Http\Controllers\BookingController::class, 'create'])->name('bookingCreate');
Route::get('/admin/booking/available/{checkin_date}', [App\Http\Controllers\BookingController::class, 'available_rooms'])->name('available_rooms');
Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('bookingStore');

Route::get('/booking/sucess', [App\Http\Controllers\BookingController::class, 'payment_success'])->name('payment_success');

Route::get('/booking/fail', [App\Http\Controllers\BookingController::class, 'payment_fail'])->name('payment_fail');




