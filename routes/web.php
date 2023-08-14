<?php

use App\Http\Controllers\ViewRoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\searchRooms;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\viewBookingsController;

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

Route::get('/home', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/index', function () {
    return view('admin/index');
});

Route::get('/viewallrooms', function () {
    return view('viewAllRooms');
});


Route::get('/checkout', function () {
    return view('checkout');
});

// Route::get('/addRooms', function () {
//     return view('admin/addRooms');
// });


Route::get('/login', function () {
    return view('login');
});




Route::get('/register', function () {
    return view('register');
});

Route::get('/roomDetails', function () {
    return view('roomDetails');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/searchRoom', function () {
    return view('SearchRoom');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});



Route::post('/addRooms', [RoomsController::class,'store'])->name('admin.addRooms');
Route::get('/addRooms', [RoomsController::class,'index'])->name('admin.addRooms');
Route::get('/viewRooms', [ViewRoomsController::class,'index'])->name('admin.viewRooms');
Route::delete('/viewRooms/{room_id}', [ViewRoomsController::class,'delete'])->name('admin.DeleteRooms');
Route::delete('/viewBookings/{booking_id}', [ViewBookingsController::class,'delete'])->name('DeleteBookings');

Route::get('/editRooms/{room_id}', [ViewRoomsController::class, 'edit'])->name('admin.editRoom');
Route::post('/editRooms/{room_id}', [ViewRoomsController::class, 'update'])->name('admin.updateRooms');
Route::post('/searchRooms', [searchRooms::class, 'search'])->name('searchRooms');
Route::get('/home', [searchRooms::class, 'index'])->name('admin.getAllRooms');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::post('/login', [UserController::class,'login'])->name('login');
Route::get('/logout', [logoutController::class,'logout'])->name('logout');


Route::get('/roomDetails/{room_id}', [RoomsController::class, 'getRoomDetail'])->name('GetRoomDetailsById');

Route::get('/getBookedDates/{room_id}',[BookingsController::class,'getBookedDates'])->name('GetRoomDates');
Route::post('/checkRoomCapacity',[BookingsController::class,'RoomCapacityCheck'])->name('checkRoomCapacity');

Route::get('/checkout/{booking_id}', [BookingsController::class,'checkoutData'])->name('checkout');

Route::post('/payment', [stripeController::class,'handlePayment'])->name('payment');
Route::get('/viewBookings', [viewBookingsController::class,'view'])->name('viewBookings');


// Route::post('/create-checkout-session', 'StripeController@handlePayment')->name('create-checkout-session');




