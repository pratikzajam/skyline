<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>RESERVATION</h2>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
            </div>
        </div>
    </section>

    @php

        $start_date = $booking->start_date;
        $end_date = $booking->end_date;

        $start_timestamp = strtotime($start_date);
        $end_timestamp = strtotime($end_date);

        // Calculate the difference in seconds
        $difference_in_seconds = $end_timestamp - $start_timestamp;

        // Convert the difference to days
        $difference_in_days = floor($difference_in_seconds / (60 * 60 * 24));

        $total_price = $difference_in_days * $room_data->price;
    @endphp


    <!-- RESERVATION -->
    <section class="section-reservation-page ">
        <div class="container">
            <div class="reservation-page">
                <!-- STEP -->
                <div class="reservation_step">
                    <ul>
                        <li><a href="#"><span>1.</span> Choose Date</a></li>
                        <li><a href="#"><span>2.</span> Choose Room</a></li>
                        <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                        <li class="active"><a href="#"><span>4.</span> Confirmation</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->
                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">
                        <div class="reservation-sidebar">
                            <!-- RESERVATION DATE -->
                            <div class="reservation-date">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Dates</h2>
                                <!-- END / HEADING -->

                                <ul>
                                    <li>
                                        <span>Check-In</span>
                                        <span>{{ date('d-m-Y', strtotime($booking->start_date)) }}</span>
                                    </li>
                                    <li>
                                        <span>Check-Out</span>
                                        <span>{{ date('d-m-Y', strtotime($booking->end_date)) }}</span>
                                    </li>
                                    <li>
                                        <span>Total Nights</span>
                                        <span>{{ $difference_in_days }}</span>
                                    </li>

                                </ul>
                            </div>
                            <!-- END / RESERVATION DATE -->
                            <!-- ROOM SELECT -->
                            <div class="reservation-room-selected selected-4 ">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Select Rooms</h2>
                                <!-- END / HEADING -->
                                <!-- ITEM -->
                                <div class="reservation-room-seleted_item">
                                    <h6>ROOM 1</h6> <span class="reservation-option">2 Adult, 1 Child</span>
                                    <div class="reservation-room-seleted_name has-package">
                                        <h2><a href="#">{{ $room_data->room_name }}</a></h2>
                                    </div>
                                    <div class="reservation-room-seleted_package">
                                        <h6>Space Price</h6>
                                        <ul>
                                            <li>
                                                <span>{{ $difference_in_days }} days stay</span>
                                                <span>{{ $difference_in_days }}*&#8377;{{ $room_data->price }}</span>
                                            </li>

                                        </ul>
                                        <ul>
                                            <li>
                                                <span>Service</span>
                                                <span>Free</span>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="reservation-room-seleted_total-room">
                                        TOTAL Room 1
                                        <span class="reservation-amout">&#8377;{{ $total_price }}</span>
                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- TOTAL -->
                                <div class="reservation-room-seleted_total ">
                                    <label>TOTAL</label>
                                    <span class="reservation-total">&#8377;{{ $total_price }}</span>
                                </div>
                                <!-- END / TOTAL -->
                            </div>
                            <!-- END / ROOM SELECT -->
                        </div>
                    </div>
                    <!-- END / SIDEBAR -->
                    <!-- CONTENT -->
                    <div class="col-md-8 col-lg-9">
                        <div class="reservation_content">
                            <form action="{{ route('payment') }}" id="payment-form" method="post">
                                @csrf
                                @method('POST')
                                <div class="reservation-billing-detail">

                                    <h4>BILLING DETAILS</h4>
                                    <label>Country <sup> *</sup></label>
                                    <select class="awe-select">
                                        <option>United Kingdom (Uk)</option>
                                        <option>India</option>
                                        <option>Thai Lan</option>
                                        <option>China</option>
                                    </select>


                                    <label>Address<sup> *</sup></label>
                                    <input type="text" class="input-text" name="address" required placeholder="Street Address">
                                    <br>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>Country<sup> *</sup></label>
                                            <input type="name" name="country" class="input-text" required placeholder=" Enter Country">
                                        </div>
                                    </div>
                                    <div class="row">
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                        <div class="col-sm-12">
                                            <label>Phone<sup> *</sup></label>
                                            <input type="number" name="phone" class="input-text" required placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror


                                    <input type="hidden" name="total" value="{{ $total_price }}">
                                    <input type="hidden" name="room_name" value="{{$room_data->room_name}}">

                                    <input type="hidden" name="booking_id" value="{{session('newlyCreatedId')}}">


                                    <button type="submit" id="checkout-button" class="btn btn-room btn4">PLACE ORDER</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- END / CONTENT -->
                </div>
            </div>
        </div>
    </section>
    <!-- END / RESERVATION -->

    @include('footer');
    @include('footerlink');
    <script>
        // Replace with your actual Stripe publishable key
        const stripe = Stripe('pk_test_51NaMHHSFUOQH0xokwxAvVbCedRZ74H8IYdUxQtnk4TFy63ubvYzOGAqVlGgPySXEV94Odj5zCm3nSgUyXlIvqaOK003fRbon31');

        // Handle the click event on the button
        document.getElementById('checkout-button').addEventListener('click', async () => {
            const form = document.getElementById('payment-form');
            const formData = new FormData(form);

            try {
                // Send the form data to the /payment endpoint
                const response = await fetch('/payment', {
                    method: 'POST',
                    body: formData
                });

                const session = await response.json();

                // Redirect to Stripe Checkout page
                const result = await stripe.redirectToCheckout({
                    sessionId: session.id
                });

                if (result.error) {
                    // Handle any errors that occurred during Checkout
                    console.error(result.error);
                }
            } catch (error) {
                console.error(error);
            }
        });
    </script>




</body>


<!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
