<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\rooms;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{

    public function index()
    {
        return view('admin.addRooms');
    }

    public function store(Request $request)
    {
        // Validation rules for the form fields
     $data=$request->validate([
            'room_no' => 'required|unique:rooms',
            'room_name' => 'required',
            'total_capacity' => 'required',
            'price' => 'required|integer',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('public/images');
            $imageUrl = asset('storage/' . str_replace('public/', '', $imagePath));
        } else {
            $imageUrl = null;
        }

        Rooms::create([
            'room_no' => $request->room_no,
            'room_name' => $request->room_name,
            'total_capacity' => $request->total_capacity,
            'price' => $request->price,
            'image_path' => $imageUrl
        ]);

           // Set success message in the session
           Session::flash('success', 'Room created successfully!');

           // Redirect back to the form with the success message
           return redirect()->route('admin.addRooms');
    }


    public function getRoomDetail($room_id)
    {
        $roomDetail = DB::table('rooms')->where('room_id', $room_id)->first();
        return view('roomDetails', compact('roomDetail'));
    }








}
