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
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room No</th>
                            <th scope="col">Room Name</th>
                            <th scope="col">Total capacity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $item->room_no }}</td>
                                <td>{{ $item->room_name }}</td>
                                <td>{{ $item->total_capacity }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <!-- End Default Table Example -->


                <div class="card">
                    <div class="card-body">
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Room No</th>
                                    <th scope="col">Room Name</th>
                                    <th scope="col">Total capacity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index=>$item)
                                <form action="{{route('admin.DeleteRooms', $item->room_id)}}" method="post">
                                            @method('DELETE')
                                            @csrf

                                    <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td>{{ $item->room_no }}</td>
                                        <td>{{ $item->room_name }}</td>
                                        <td>{{ $item->total_capacity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.editRoom', ['room_id' => $item->room_id]) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            {{-- <a href="{{route('admin.DeleteRooms',$item->room_id)}}">delete</a> --}}

                                        </td>
                                    </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
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

<script>
    // Get all the "Edit" buttons and add a click event listener
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const roomId = this.dataset.roomId;
            const form = document.createElement('form');
            form.action = `/viewRooms/${roomId}/edit`;
            form.method = 'get';
            document.body.appendChild(form);
            form.submit();
        });
    });
</script>

</html>
