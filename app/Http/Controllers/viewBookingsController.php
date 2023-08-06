<?php

namespace App\Http\Controllers;
use App\Models\bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class viewBookingsController extends Controller
{
    public function view()
    {
    //   $viewBookings=DB::table('bookings')
    //         ->join('rooms', 'rooms.room_id', '=', 'bookings.room_id')
    //         ->join('billing_details', 'billing_details.booking_id', '=', 'bookings.booking_id')
    //         ->join('users', 'users.id', '=', 'bookings.user_id')
    //         ->select('rooms.room_name', 'users.name', 'bookings.start_date','bookings.end_date','billing_details.amount','bookings.booking_id')
    //         ->orderBy('bookings.booking_id', 'desc')
    //         ->get();

    $viewBookings = DB::table('bookings')
    ->leftJoin('rooms', 'rooms.room_id', '=', 'bookings.room_id')
    ->leftJoin('billing_details', 'billing_details.booking_id', '=', 'bookings.booking_id')
    ->leftJoin('users', 'users.id', '=', 'bookings.user_id')
    ->select('rooms.room_name', 'users.name', 'bookings.start_date', 'bookings.end_date', 'billing_details.amount', 'bookings.booking_id')
    ->orderBy('bookings.booking_id', 'desc')
    ->get();

        return view('admin.viewBookings', ['viewBookings' => $viewBookings]);

    }

    public function delete($booking_id)
    {
        DB::table('bookings')->where('booking_id', $booking_id)->delete();

        return back()->with('success', 'Record deleted successfully.');
    }
}
