<?php

namespace App\Http\Controllers;

use App\Models\billing_details;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;

class stripeController extends Controller
{
    public function handlePayment(Request $request)
    {




        // Set your Stripe Secret Key
        Stripe::setApiKey(config('stripe.sk'));



        $data = $request->validate([
            'total' => 'required',
            'room_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required|digits:10|numeric',
            'booking_id' => 'required'
        ]);




        $total_amount = $data['total'];
        $room_name = $data['room_name'];
        $address = $data['address'];
        $country = $data['country'];
        $booking_id = $data['booking_id'];
        $phone = $data['phone'];




        // $token = $request->input('stripeToken');
        // dd($token,$total_amount);

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'inr', // Replace with your desired currency
                            'unit_amount' => $total_amount * 100, // Amount in cents
                            'product_data' => [
                                'name' => $room_name, // Replace with your product name
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode'=> 'payment',
                'success_url' => route('login'), // Replace with your success URL
                'cancel_url' => route('register'), // Replace with your cancel URL
            ]);

            billing_details::create([
                'country' => $country,
                'address' => $address,
                'payment_status' => 1,
                'booking_id' => $booking_id,
                'payment_id' => $session->id,
                'amount' => $total_amount,
                'phone' => $phone,
            ]);




            // Handle successful payment
            // You can save the payment details, update the database, or send confirmation emails here
            return response()->json(['id' => $session->id]);





        } catch (\Exception $e) {

            billing_details::create([
                'country' => $country,
                'address' => $address,
                'payment_status' => 0,
                'booking_id' => $booking_id,
                'amount' => $total_amount,
                'phone' => $phone,

            ]);
            // Handle payment error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
