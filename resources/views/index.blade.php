<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')




    <!-- SLIDER -->
    <section class="section-slider height-v">
        <div id="index12" class="owl-carousel  owl-theme">
            <div class="item">
                <img alt="Third slide" src="images/Home-1/Slider-v1.jpg" class="img-responsive">
                <div class="carousel-caption">
                    <h1>Welcome to Skyline</h1>
                    <p><span class="line-t"></span>Hotels & Resorts <span class="line-b"></span></p>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="images/Home-2/Slider-v2.jpg" class="img-responsive">
                <div class="container">
                    <div class="carousel-caption ">
                        <h1 class="v2">Enjoy a Luxury Experience</h1>
                        <p class="p-v2"><span class="line-t"></span>Hotels & Resorts <span class="line-b"></span></p>
                    </div>
                </div>
            </div>
        </div>
        <form class="check-avail" id="availability-form" action="{{ route('searchRooms') }}">
            @csrf

            <div class="container">
                <div class="arrival date-title">
                    <label>Arrival Date</label>
                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control" type="text" name="start_date"> <!-- Add name attribute -->
                        <span class="input-group-addon"><img src="images/Home-1/date-icon.png" alt="#"></span>
                    </div>
                </div>
                <div class="departure date-title">
                    <label>Departure Date</label>
                    <div id="datepickeri" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control" type="text" name="end_date"> <!-- Add name attribute -->
                        <span class="input-group-addon"><img src="images/Home-1/date-icon.png" alt="#"></span>
                    </div>
                </div>
                <div class="adults date-title">
                    <label>Adults</label>
                    <div class="carousel-search">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle " data-toggle="dropdown" name="adult" href="#">2</a>
                            <ul class="dropdown-menu">
                                <li><a>1</a></li>
                                <li><a>2</a></li>
                                <li><a>3</a></li>
                                <li><a>4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <input type="hidden" name="adult" id="selectedAdults" value="2"> --}}
                <div class="children date-title">
                    <label>Children</label>
                    <div class="carousel-search">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle " data-toggle="dropdown" name="children" href="#">2</a>
                            <ul class="dropdown-menu">
                                <li><a>1</a></li>
                                <li><a>2</a></li>
                                <li><a>3</a></li>
                                <li><a>4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <input type="hidden" name="children" id="selectedChildren" value="2"> --}}

                {{-- <div class="find_btn date-title">
                    <div class="text-find">
                        Check
                        <br>Availability
                    </div>
                </div> --}}

                <button class="find_btn date-title" type="submit">Check
                    <br>Availability</button>
            </div>
        </form>
    </section>


    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="response-toast">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Response</strong>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <!-- The JSON response will be displayed here -->
        </div>
    </div>


    <!-- END / SLIDER -->
    <!-- OUR-ROOMS-->
    <section class="rooms">
        <div class="container">
            <h2 class="title-room">Our Rooms</h2>
            <div class="outline"></div>
            <p class="rooms-p">When you host a party or family reunion, the special celebrations let you streng then
                bonds with</p>
            <div class="wrap-rooms">
                <div class="row">
                    <div id="rooms" class="owl-carousel owl-theme">

                        @foreach ($roomsData as $room)
                            @php
                                $room_id = $room->room_id;
                            @endphp
                            <a href="{{ route('GetRoomDetailsById', ['room_id' => $room_id]) }}">
                                <div class="item ">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                        <div class="wrap-box">
                                            <div class="box-img">
                                                <img src="images/Home-1/our-1.jpg" class="img-responsive"
                                                    alt="PLuxury Room" title="Luxury Room">
                                            </div>
                                            <div class="rooms-content">
                                                <h4 class="sky-h4">{{ $room->room_name }}</h4>
                                                <p class="price">&#x20b9;{{ number_format($room->price) }}/ Per Night
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /container -->
    </section>
    <!-- END / ROOMS -->
    <!-- ABOUT-US-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="about-centent">
                        <h2 class="about-title">About Us</h2>
                        <div class="line"></div>
                        <p class="about-p"> Welcome to our luxury resort in the heart of Melbourne, where unforgettable
                            experiences await you. Nestled amidst the vibrant cityscape, our resort offers a serene
                            oasis of refined indulgence, setting the stage for an extraordinary stay.</p>
                        <p class="about-p1">RAt our resort, we redefine luxury with our unparalleled amenities,
                            impeccable service, and attention to detail. Every aspect of your stay is meticulously
                            crafted to ensure a seamless and unforgettable experience. From the moment you step foot
                            through our doors, you'll be enveloped in an atmosphere of sophistication and elegance.</p>
                        <a href="/about-us" class="read-more">READ MORE </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ">
                    <div class="about-img">
                        <div class="img-1">
                            <img src="images/Home-1/about-3.jpg" class="img-responsive" alt="Image">
                            <div class="img-2">
                                <img src="images/Home-1/about-1.jpg" class="img-responsive" alt="Image">
                            </div>
                            <div class="img-3">
                                <img src="images/Home-1/about-2.jpg" class="img-responsive" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END/ ABOUT-US-->
    <!-- BEST -->
    <section class="best">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-1.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Master Bedrooms</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-2.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Sea View Balcony</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-3.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Pool & Spa</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-4.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Wifi Coverage</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-5.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">AwESOME pACKAGES</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-6.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">cLEANING eVERDAY</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-7.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">bUTFFET Breakfast</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best">
                        <div class="icon-best">
                            <img src="images/Home-1/about-icon-8.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Airport Taxi</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / BEST -->
    <!-- TESTIMONOALS -->
    <section class="testimonials">
        <div class="testimonials-h">
            <div class="testimonials-content">
                <div class="container">
                    <div id="testimonials" class="owl-carousel owl-theme">
                        <div class="item ">
                            <div class="img-testimonials"><img src="images/Home-1/about-testimonials-img.png"
                                    alt="#"></div>
                            <p class="testimonials-p"><span>“</span>​‌ This is the only place to stay in Catalina! I
                                have stayed in the cheaper hotels and they were fine, but this is just the icing on the
                                cake! After spending the day bike riding and hiking to come back and enjoy a glass of
                                wine while looking out your <span>​‌​‌”</span> ocean view window and then to top it all
                                off...</p>
                            <h5 class="sky-h5">JULIA ROSE</h5>
                            <p class="testimonials-p1">From Los Angeles, California</p>
                        </div>
                        <div class="item">
                            <div class="img-testimonials"><img src="images/Home-1/about-testimonials-img.png"
                                    alt="#"></div>
                            <p class="testimonials-p"><span>“</span>​‌ Thisis the only place to stay in Catalina! I
                                have stayed in the cheaper hotels and they were fine, but this is just the icing onthe
                                cake! After spending the day bike riding and hiking to come back and enjoy a glass of
                                wine while looking out your <span>​‌​‌”</span> ocean view window and then to top it all
                                off...</p>
                            <h5 class="sky-h5">JULIA ROSE</h5>
                            <p class="testimonials-p1">From Los Angeles, California</p>
                        </div>
                        <div class="item">
                            <div class="img-testimonials"><img src="images/Home-1/about-testimonials-img.png"
                                    alt="#"></div>
                            <p class="testimonials-p"><span>“</span>​‌ This is the only place to stay in Catalina! I
                                have stayed in the cheaper hotels and they were fine, but this is just the icing on the
                                cake! After spending the day bike riding and hiking to come back and enjoy a glass of
                                wine while looking out your <span>​‌​‌”</span> ocean view window and then to top it all
                                off...</p>
                            <h5 class="sky-h5">JULIA ROSE</h5>
                            <p class="testimonials-p1">From Los Angeles, California</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / TESTIMONOALS -->
    <!--OUR-EVENTS-->
    <section class="events">
        <div class="container event-container">
            <h2 class="events-title">Our Events</h2>
            <div class="line"></div>
            <div id="events-v2" class="owl-carousel owl-theme">
                <div class="item ">
                    <div class="events-item">
                        <div class="events-img"><img src="images/Home-1/Our-Events-1.jpg" class="img-responsive"
                                alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3">Wedding Day</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="events-item">
                        <div class="events-img"><img src="images/Home-1/Our-Events-2.jpg" class="img-responsive"
                                alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3">Golf Cup 2017</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="events-item">
                        <div class="events-img"><img src="images/Home-1/Our-Events-3.jpg" class="img-responsive"
                                alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3"> Beach Sports</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / OUR EVENTS -->

    <!-- OUR-GALLERY-->
    <section class="gallery-our">
        <div class="container-fluid">
            <div class="gallery">
                <h2 class="title-gallery">Our Gallery</h2>
                <div class="outline"></div>
                <ul class="nav nav-tabs text-uppercase">
                    <li class="active"><a data-toggle="tab" href="#Hotel">Hotel & Ground</a></li>
                    <li><a data-toggle="tab" href="#menu1">Room/Suite </a></li>
                    <li><a data-toggle="tab" href="#menu2">Bathroom</a></li>
                    <li><a data-toggle="tab" href="#menu3">Dining</a></li>
                </ul>
                <br />
                <div class="tab-content">
                    <div id="Hotel" class="tab-pane fade in active">
                        <div class="product ">
                            <div class="row">
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-1.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main " title>
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-1-1.jpg"
                                                    data-littlelightbox-group="gallery"
                                                    title="Luxury Room view all"><i class="ion-ios-plus-empty"
                                                        aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-2.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="HIHI"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-3.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-3-3.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-4.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-4-4.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-5.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-5-5.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-6.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-6-6.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-7.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-7-7.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-8.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-8-8.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-6.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-7.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-3-3.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-8.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-4-4.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-7.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-8.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-6-6.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-3.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-4.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-5.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-6.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-7.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="images/Home-1/gallery-8.jpg" class="img-responsive"
                                                alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                                    data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end-tab-content -->
                <div class="text-center">
                    <button type="button" class="btn btn-default btn-our">VIEW MORE</button>
                </div>
            </div>
            <!-- /gallery -->
        </div>
        <!-- /container -->
    </section>
    <!-- END / OUR GALLERY -->
    <!--FOOTER-->

    @include('footer')
    @include('footerlink')


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownItems = document.querySelectorAll(".dropdown-item");
            const selectedAdultsInput = document.getElementById("selectedAdults");
            const selectedChildrenInput = document.getElementById("selectedChildren");

            dropdownItems.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();
                    const selectedValue = this.dataset.value;
                    document.querySelector(".btn.dropdown-toggle").textContent = selectedValue;
                    selectedAdultsInput.value = selectedValue;
                    selectedChildrenInput.value = selectedValue;
                });
            });
        });

        $(document).ready(function() {
            $('#availability-form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                const formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        // Handle success if needed
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errorMessages = Object.values(xhr.responseJSON.errors).join(
                                '<br>');
                            $('.toast-body').html(errorMessages);

                            // Show the toast
                            $('.toast').toast('show');
                        }
                    }
                });
            });
        });
    </script>
</body>


<!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
