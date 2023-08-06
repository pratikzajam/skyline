<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerlink');
</head>

<body>

    @include('admin.header');

    @include('admin.sidebar');



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Add Rooms</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Rooms</h5>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Vertical Form -->
                                <form class="row g-3" method="post" enctype="multipart/form-data"
                                    action={{ route('admin.addRooms') }}>
                                    @csrf
                                    @method('POST')

                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label">Room No</label>
                                        <input type="text" name="room_no" class="form-control" id="inputNanme4">
                                        @error('room_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmail4" class="form-label">Room Name</label>
                                        <input type="name" name="room_name" class="form-control" id="inputEmail4">
                                        @error('room_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputPassword4" class="form-label">Total Capacity</label>
                                        <input type="number" name="total_capacity" class="form-control"
                                            id="inputPassword4">
                                        @error('total_capacity')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputPassword4" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" id="inputPassword4">
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputPassword4" class="form-label">Upload Image</label>
                                        <input type="file" name="image_path" class="form-control"
                                            id="inputPassword4">
                                        @error('image_path')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form><!-- Vertical Form -->

                            </div>
                        </div>













                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">







                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    @include('admin.footerlink');

</body>

</html>
