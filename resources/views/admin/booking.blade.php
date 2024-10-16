<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @include('admin.css') <!-- Link to any custom styles -->

    <style>
        /* Custom table and card styling */
        .table-box-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table-dark {
            border: 1px solid #333;
        }

        .table-dark th, .table-dark td {
            border-color: #444;
            padding: 15px;
        }

        .card-wrapper {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Button styling with hover effect */
        .btn-warning, .btn-danger, .btn-secondary {
            border-radius: 5px;
            transition: all 0.2s ease-in-out;
        }

        .btn-warning:hover, .btn-danger:hover, .btn-secondary:hover {
            transform: scale(1.05);
        }

        /* Image styling */
        .room-image {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            border: 2px solid #ffffff;
        }

        /* Status color styling */
        .status-approved {
            color: skyblue;
        }

        .status-rejected {
            color: red;
        }

        .status-waiting {
            color: yellow;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="card-wrapper">
                @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                    {{ session('success') }}
                </div>
                @endif

                <!-- Bookings Table -->
                <table class="table table-dark table-bordered table-box-shadow">
                  <thead>
                      <tr>
                          <th>Room ID</th>
                          <th>Customer</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Arrival Date</th>
                          <th>Leaving Date</th>
                          <th>Status</th>
                          <th>Room Title</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Loop through rooms -->
                      @foreach($room as $room)
                          <tr>
                              <td>{{ $room->room_id }}</td>
                              <td>{{ $room->name }}</td>
                              <td>{{ $room->email }}</td>
                              <td>{{ $room->phone }}</td>
                              <td>{{ $room->start_date }}</td>
                              <td>{{ $room->start_end }}</td>
                              <td>
                                @if ($room->status == 'approve')
                                  <span class="status-approved">Approved</span>
                                @elseif ($room->status == 'rejected')
                                  <span class="status-rejected">Rejected</span>
                                @else
                                  <span class="status-waiting">Waiting</span>
                                @endif
                              </td>
                              <td>{{ $room->room->room_title }}</td>
                              <td>{{ $room->room->price }}Dh</td>
                              <td>
                                <img src="/Upload_image/{{$room->room->image}}" class="room-image" alt="Room Image">
                              </td>
                              <td>
                                  <a href="{{ url('approve_book', $room->id) }}" class="btn btn-secondary mb-2">Approve</a>
                                  <a href="{{ url('reject_book', $room->id) }}" class="btn btn-warning mb-2">Reject</a>

                                  <form action="{{ url('delete_booking', $room->id) }}" method="POST" style="display:inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
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

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQHTYfayZJChXo5s8Vt1tZTiDFrTOejgwmZe3+R4yA+avDyMsh3c59CxW5jkF8F" crossorigin="anonymous"></script>
    @include('admin.script')
    @include('admin.footer')
  </body>
</html>
