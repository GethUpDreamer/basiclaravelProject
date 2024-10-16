<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS -->
    @include('admin.css')
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Change to your preferred font */
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .card {
            border-radius: 10px; /* Rounded corners for the card */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
            margin-bottom: 20px; /* Space below the card */
        }
        .form-control {
            border-radius: 5px; /* Rounded corners for inputs */
        }
        .btn-primary {
            border-radius: 5px; /* Rounded corners for buttons */
            background-color: #007bff; /* Button background color */
            border: none; /* Remove border */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .card-header {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
        }
        .text-center {
            margin-top: 20px; /* Space above the button */
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation -->
        @include('admin.sidebar')
        <div class="page-content">
            <div class="container-fluid mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Mail Send to {{$data->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('mail',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="room_title">Greetig</label>
                                <input type="text" class="form-control" id="room_title" name="greeting" >
                            </div>
                            <div class="form-group">
                                <label for="description">Mail Body</label>
                                <textarea class="form-control" id="description" name="body" rows="4" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Action</label>
                                <input type="text"  class="form-control"name="action_text">
                            </div>
                            <div class="form-group">
                                <label for="price">Action url</label>
                                <input type="text"  class="form-control" id="price" name="action_text">
                            </div>

                            <div class="form-group">
                                <label for="price">End Line</label>
                                <input type="text"  class="form-control" id="price" name="endline">
                            </div>
                          
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
