<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\HomeController;

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

// Dashboard route protected by Jetstream authentication and middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),  // corrected this line (removed space)
    'verified',
])->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

// Public routes
Route::get('/', [AdminController::class, 'Home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');


// Admin-protected routes for rooms

    Route::get('/create_room', [AdminController::class, 'create_room']);

    Route::post('/add_room', [AdminController::class, 'add_room'])->name('add_room');

    Route::get('/view_room', [AdminController::class, 'view_room']);

    Route::get('/update_room/{id}', [AdminController::class, 'update_room']);

    Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

    Route::delete('/room_delete/{id}', [AdminController::class, 'room_delete']);


Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
// Booking route (for authenticated users only)
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->name('add_booking');

Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth','admin']);

Route::delete('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);

Route::get('/view_gallary', [AdminController::class, 'view_gallary']);

Route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);

Route::delete('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);


Route::post('/contact',[HomeController::class,'contact']);


Route::get('/all_messages',[AdminController::class,'all_messages']);

Route::get('/send_mail/{id}',[AdminController::class,'send_mail']);

Route::post('/mail/{id}',[HomeController::class,'mail']);