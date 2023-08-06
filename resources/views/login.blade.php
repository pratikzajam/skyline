<!DOCTYPE html>
<html lang="en">
@include('headerlink')

<body>
    @include('header')
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">LOGIN ACCOUNT</h2>
                <h5 class="p-v1">Lorem Ipsum is simply dummy text of the printing</h5>
                <form method="post" action="{{route('login')}}">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="" placeholder="Email">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>

                    @enderror
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password"
                            placeholder="Password">
                          @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-field"></span>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">LOGIN</button>
                </form>
                <p>I don’t have an account &nbsp;- &nbsp; Forgot Password</p>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->

    @include('footer');
    @include('footerlink');
</body>


<!-- Mirrored from landing.engotheme.com/html/skyline/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 12:08:16 GMT -->

</html>
