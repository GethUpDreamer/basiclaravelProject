<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <style>
        body {
            background-color: #343a40;
            color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .page-header {
            background-color: #495057;
            padding: 20px;
            border-bottom: 1px solid #ffffff;
        }

        .page-header h1 {
            color: #ffffff;
            font-weight: 600;
        }

        .page-content {
            background-color: #3b3e43;
            padding: 30px;
            min-height: 100vh;
        }

        .card {
            background-color: #495057;
            border: 1px solid #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header h5 {
            color: #ffffff;
            font-weight: 600;
        }

        .table-box-shadow {
            background-color: #343a40;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table-box-shadow th,
        .table-box-shadow td {
            border: 1px solid #ffffff;
            padding: 10px;
        }

        .table-box-shadow th {
            background-color: #495057;
            color: #ffffff;
            font-weight: 600;
        }

        .table-box-shadow td {
            background-color: #3b3e43;
            color: #f8f9fa;
        }

        .table-box-shadow tbody tr:hover {
            background-color: #495057;
        }

        .btn-primary {
            background-color: #ffffff;
            color: #343a40;
            border: 1px solid #ffffff;
        }

        .btn-danger {
            background-color: #ff4d4d;
            color: #ffffff;
            border: 1px solid #ff4d4d;
        }

        .btn-primary:hover {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
        }

        .btn-danger:hover {
            background-color: #cc0000;
            color: #ffffff;
            border: 1px solid #cc0000;
        }
    </style>
   @include('admin.css')



  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-white">Room Details</h1>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            </div>
            <!-- Room Details Section -->
            <div class="card">
                <div class="card-header">
                    <h5 class="text-white">Room Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-bordered table-box-shadow">
                        <thead>
                            <tr>
                                <th>Room ID</th>
                                <th>Room Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Wifi</th>
                                <th>Room Type</th>
                                <th>Imgaes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through rooms -->
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $room->id }}</td>
                                    <td>{{ $room->room_title }}</td>
                                    <td>{{ $room->description }}</td>
                                    <td>{{ $room->price }}DH</td>
                                    <td>{{ $room->wifi }}</td>
                                    <td>{{ $room->room_type }}</td>
                                    <td>
                                        <img src="Upload_image/{{$room->image}}" style="width: 100px; height: 100px; border-radius: 10px; border: 2px solid #ffffff;">
                                    </td>
                                    <td>
                                        <a href="{{ url('update_room', $room->id) }}" class="btn btn-warning">Update</a>
                                        <form action="{{ url('room_delete', $room->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="retun confirm('Are you sure to delet this')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
    @include('admin.footer')
  </body>
</html>
