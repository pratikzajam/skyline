<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')
    <!-- BODY-LOGIN -->


    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Contact us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
            </div>
        </div>
    </section>
    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="text">
                            <h2>Contact</h2>
                            <p>Planning your next stay at Skyline Hotel? Our reservations team is ready to help you book your dream getaway. Reach out to us via phone or email, and we'll ensure your stay is nothing short of perfect..</p>
                            <ul>
                                <li><i class=" fa ion-ios-location-outline"></i> 121 King Str, Melbourne Victoria</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> 1-548-854-8898</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a
                                        href="https://landing.engotheme.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="fa929f969695ba8991839693949f92958e9f96d4999597">[email&#160;protected]</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form action="https://landing.engotheme.com/html/skyline/demo/send_mail_contact.php"
                                method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="name" placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="message" class="field-textarea" placeholder="Write what do you want"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-room">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->


    @include('footer');
    @include('footerlink');
</body>


<!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
