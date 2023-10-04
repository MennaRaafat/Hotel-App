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

Route::get('/', [App\Http\Controllers\RoomController::class, 'index'])->name('roomIndex');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/roomType', [App\Http\Controllers\RoomTypeController::class, 'index'])->name('roomTypeIndex')->middleware(['auth','admin.auth']);
Route::get('/admin/roomType/add', [App\Http\Controllers\RoomTypeController::class, 'create'])->name('roomTypeCreate')->middleware(['auth','admin.auth']);
Route::post('/admin/roomType/store', [App\Http\Controllers\RoomTypeController::class, 'store'])->name('roomTypeStore')->middleware(['auth','admin.auth']);
Route::get('/admin/roomType/{id}', [App\Http\Controllers\RoomTypeController::class, 'show'])->name('roomTypeShow')->middleware(['auth','admin.auth']);



Route::post('/room/{id}/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('roomComment')->middleware('auth');

Route::get('/room/{id}/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('roomCommentIndex')->middleware('auth');


Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('roomIndex');

Route::get('/room/{id}', [App\Http\Controllers\RoomController::class, 'show'])->name('roomShow');

Route::get('/admin/room/add', [App\Http\Controllers\RoomController::class, 'create'])->name('roomCreate')->middleware(['auth','admin.auth']);
Route::post('/admin/room/store', [App\Http\Controllers\RoomController::class, 'store'])->name('roomStore')->middleware(['auth','admin.auth']);


Route::get('/admin/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departmentIndex')->middleware(['auth','admin.auth']);
Route::get('/admin/department/add', [App\Http\Controllers\DepartmentController::class, 'create'])->name('departmentCreate')->middleware(['auth','admin.auth']);
Route::post('/admin/department/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('departmentStore')->middleware(['auth','admin.auth']);


Route::get('/admin/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staffIndex')->middleware(['auth','admin.auth']);
Route::get('/admin/staff/add', [App\Http\Controllers\StaffController::class, 'create'])->name('staffCreate')->middleware(['auth','admin.auth']);
Route::post('/admin/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staffStore')->middleware(['auth','admin.auth']);
Route::get('/admin/staff/{id}', [App\Http\Controllers\StaffController::class, 'show'])->name('staffShow')->middleware(['auth','admin.auth']);

Route::get('/admin/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('bookingIndex')->middleware(['auth','admin.auth']);

Route::get('/booking/add/', [App\Http\Controllers\BookingController::class, 'create'])->name('bookingCreate')->middleware('auth');

Route::get('/booking/available/{checkin_date}/', [App\Http\Controllers\BookingController::class, 'available_rooms'])->name('available_rooms')->middleware('auth');
Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('bookingStore')->middleware('auth');

Route::get('/booking/sucess', [App\Http\Controllers\BookingController::class, 'payment_success'])->name('payment_success')->middleware('auth');

Route::get('/booking/fail', [App\Http\Controllers\BookingController::class, 'payment_fail'])->name('payment_fail')->middleware('auth');

Route::get('/booking/myBook', [App\Http\Controllers\BookingController::class, 'userBook'])->name('userBook')->middleware('auth');




