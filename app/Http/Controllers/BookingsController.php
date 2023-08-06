<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\bookings;
use App\Models\rooms;
use Carbon\carbon;


class BookingsController extends Controller
{
    public function getBookedDates($room_id)
    {
        $getBookedDates = DB::table('bookings')->where('room_id', $room_id)
            ->get();

        $dates = [];

        foreach ($getBookedDates as $bookedDates) {
            $start_date = $bookedDates->start_date;
            $end_date = $bookedDates->end_date;
        }

        $currentDate = $start_date;
        while ($currentDate <= $end_date) {
            $dates[] = $currentDate;
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        return response()->json($dates);
    }



    public  function RoomCapacityCheck(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'adult' => 'required|numeric',
            'children' => 'required|numeric',


        ]);
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $formatted_start_date = Carbon::parse($start_date)->format('Y-m-d');
        $formatted_end_date = Carbon::parse($end_date)->format('Y-m-d');

        $room_id = $data['room_id'];
        $adult = $data['adult'];
        $children = $data['children'];

        $total_capacity = $adult + $children;

        $room_details = DB::table('rooms')
            ->where('room_id', $room_id)
            ->first();

        $room_total_capacity = $room_details->total_capacity;


        $userSessions = session('users');

        if ($userSessions) {
            $user_id = $userSessions->id;

            if ($room_total_capacity <= $total_capacity) {
                session::flash('error', "only {$room_total_capacity} persons are allowed");
            } else {
                session::flash('success', "success");

                $newBooking = bookings::create([
                    'room_id' => $room_id,
                    'start_date' => $formatted_start_date,
                    'end_date' => $formatted_end_date,
                    'user_id' => $user_id,
                ]);

                $newlyCreatedId = $newBooking->booking_id;



                session(['newlyCreatedId' => $newlyCreatedId]);

                return redirect()->route('checkout', [$newlyCreatedId]);
            }
        } else {
            session::flash('error', "please login first");
            return redirect()->route('login');
        }
    }


    public function checkoutData($booking_id)
    {

        $booking = bookings::find($booking_id);

        if($booking)
        {
            $room_id=$booking->room_id;
        }

        $room_data= DB::table('rooms')
        ->where('room_id',$room_id)
        ->first();



        // Pass the booking data to the checkout view
        return view('checkout', compact('booking','room_data'));
    }
}
