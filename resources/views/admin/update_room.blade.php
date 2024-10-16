<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Room</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <base href="../public">
    @include('admin.css')

    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .form-container {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #444;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            max-width: 600px;
            margin: 50px auto;
        }

        .form-container h1 {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }

        .form-control {
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
        }

        .form-control:focus {
            border-color: #666;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-group label {
            text-transform: uppercase;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        select.form-control, .form-control-file {
            background-color: #333;
            color: #fff;
        }

        .alert {
            margin-bottom: 20px;
        }

        .form-container small.text-muted {
            color: #bbb;
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
                    <div class="form-container">
                        <h1>Update Room</h1>

                        <!-- Display Success or Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Update Room Form -->
                        <form action="{{ url('edit_room', $room->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="room_title">Room Title</label>
                                <input type="text" class="form-control" id="room_title" name="room_title" value="{{ $room->room_title }}" placeholder="Enter Room Title">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if($room->image)
                                    <img src="/Upload_image/{{ $room->image }}" width="100" alt="Room Image">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Room Description">{{ $room->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $room->price) }}" placeholder="Enter Room Price">
                            </div>

                            <div class="form-group">
                                <label for="room_type">Room Type</label>
                                <select name="room_type" class="form-control" id="room_type">
                                    <option selected>{{ $room->room_type }}</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Deluxe">Deluxe</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="wifi">Wi-Fi</label>
                                <select class="form-control" id="wifi" name="wifi">
                                    <option selected value="{{ $room->wifi }}">{{ $room->wifi }}</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Room</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('admin.script')
    @include('admin.footer')
</body>
</html>
