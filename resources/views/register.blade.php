<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1 page-v2">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">REGISTER FORM</h2>
                <h5 class="p-v1">If you no have account in The Lotus Hotel! Register and feeling</h5>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Name*">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" required="required"
                            title="" placeholder="Email*">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password"
                            placeholder="Password*">
                        <span data-toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input id="password-field1" type="password" class="form-control" name="confirm_password"
                            placeholder="Confirm Password *">
                        <span data-toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    @error('confirm_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                    <button type="submit" class="btn btn-default">REGISTER</button>
                </form>
            </div>
        </div>
    </section>


        @include('footer');
        @include('footerlink');
</body>


<!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
