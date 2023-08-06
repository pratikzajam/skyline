<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class searchRooms extends Controller
{

    public function search(Request $request)
    {

        $start_date = $request->input('start_date');

        // dd($start_date);

        // $data = $request->validate([
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'adult' => 'required|numeric',
        //     'children' => 'numeric',

        // ]);
        // dd($data);



        //store start_date data in $start_date variable
        $start_date = $request->input('start_date');
        $formatted_start_date= date('Y-m-d',strtotime($start_date));
        $end_date = $request->input('end_date');
        $formatted_end_date= date('Y-m-d',strtotime($end_date));
        $total_capacity = $request->input('adult') + $request->input('children');

        // $available_rooms = DB::table('rooms')
        //     ->where('total_capacity', '<=', $total_capacity)
        //     ->where(function ($query) use ( $formatted_start_date, $formatted_end_date) {
        //         $query->where('start_date', '>',$formatted_end_date)
        //             ->orWhere('end_date', '<',$formatted_start_date);
        //     })
        //     ->orWhereNull('start_date')
        //     ->orWhereNull('end_date')
        //     ->get();


        $available_rooms=DB::table('rooms')
        ->where('total_capacity','>=',$total_capacity)
        ->get();

       foreach($available_rooms as $rooms)
       {
       $room_ids[]=$rooms->room_id;
      }

       $available_room_ids=DB::table('bookings')
       ->whereIn('room_id',$room_ids)
       ->where('start_date','>',$formatted_end_date)
       ->orwhere('end_date','<',$formatted_start_date)
       ->orWhereNull('start_date')
       ->orWhereNull('end_date')
       ->get('room_id');

       $room_ids_array = $available_room_ids->pluck('room_id')->toArray();


       $searched_rooms=DB::table('rooms')
       ->whereIn('room_id',$room_ids_array)
       ->get();

 if (!$searched_rooms->isEmpty()) {
            return view('searchRoom', compact('searched_rooms'));
        } else {
            Session::flash('success', 'Rooms are not available!');
            // Redirect back to the form to show the flash message
            return redirect()->back();
        }
    }





    public function index()
    {
        $roomsData = DB::table('rooms')->get();

        return view('index', compact('roomsData'));
    }
}
