<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')

    @php
    use Carbon\Carbon;
@endphp



    <!-- BANNER -->
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>ROOMS & RATES</h2>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
            </div>
        </div>
    </section>
    <!-- END-BANNER -->
    <!-- BODY-ROOM-1 -->
    <section class="body-room-1 ">
        <div class="container">
            <div class="room-wrap-1">
                <div class="row">
                    <!-- ITEM -->

                    @foreach ($searched_rooms as $rooms )


                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="room-item-1">
                            <h2><a href="#">{{$rooms->room_name}}</a></h2>
                            <div class="img">
                                <a href="#"><img src="images/Room/room.jpg" alt="#"></a>
                            </div>
                            <div class="content">
                                <p>{{$rooms->description}}</p>
                                <ul>
                                    <li>Max: {{$rooms->total_capacity}} Person(s)</li>

                                </ul>
                            </div>
                            <div class="bottom">
                                <span class="price">Starting <span class="amout">{{number_format($rooms->price)}}</span> /day</span>
                                <a href="{{route('GetRoomDetailsById',['room_id' => $rooms->room_id])}}" class="btn">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- END/BODY-ROOM-1-->
    <!--FOOTER-->
    <footer class="footer-sky">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                        <div class="icon-email">
                            <a href="#" title="Email"><img src="images/Home-1/footer-top-icon-l.png"
                                    alt="Email" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                        <div class="textbox">
                            <form class="form-inline">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Your email address"
                                            aria-label="Search for...">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="ion-android-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 text-right">
                        <div class="footer-icon-l">
                            <a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" title="Facebook"><i class="fa fa-facebook-square"
                                    aria-hidden="true"></i></a>
                            <a href="#" title="Tripadvisor"><i class="fa fa-tripadvisor"
                                    aria-hidden="true"></i></a>
                            <a href="#" title="Isnstagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-top -->
        <div class="footer-mid">
            <div class="container">
                <div class="row padding-footer-mid">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-logo text-center list-content">
                            <a href="index.html" title="Skyline"><img src="images/Home-1/sky-logo-footer.png"
                                    alt="Image"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1  ">
                        <div class="list-content">
                            <ul>
                                <li><a href="attractions.html" title="">Site Map</a></li>
                                <li><a href="tems_condition_1.html" title="">Term & Conditions</a></li>
                                <li><a href="#" title="">Privacy Policy</a></li>
                                <li><a href="#" title="">Help</a></li>
                                <li><a href="#" title="">Affiliate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1 ">
                        <div class="list-content ">
                            <ul>
                                <li><a href="#" title="">Our Location</a></li>
                                <li><a href="#" title="">Career</a></li>
                                <li><a href="about.html" title="">About Us</a></li>
                                <li><a href="contact.html" title="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1">
                        <div class="list-content ">
                            <ul>
                                <li><a href="#" title="">FAQS</a></li>
                                <li><a href="#" title="">News</a></li>
                                <li><a href="gallery_1.html" title="">Photo & Video</a></li>
                                <li><a href="restaurant_1.html" title="">Restaurant</a></li>
                                <li><a href="#" title="">Gift Card</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
