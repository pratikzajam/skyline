<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewRoomsController extends Controller
{

    public function index()
    {
        $data = DB::table('rooms')->get();
        return view('admin.viewRooms', ['data' => $data]);
    }

    public function delete($room_id)
    {
        DB::table('rooms')->where('room_id', $room_id)->delete();

        return back()->with('success', 'Record deleted successfully.');
    }

    public function edit($room_id)
    {
        $room = DB::table('rooms')->where('room_id', $room_id)->first();
        return view('admin.editRooms', ['room' => $room]);
    }

    public function update(Request $request, $room_id)
    {

        $data = $request->validate([
            'room_no' => 'required',
            'room_name' => 'required',
            'total_capacity' => 'required|numeric',
            'price' => 'required'
        ]);

        DB::table('rooms')->where('room_id', $room_id)->update($data);
    //   redirect('admin.viewRooms')->with('success', 'Record updated successfully.');
    }
}
