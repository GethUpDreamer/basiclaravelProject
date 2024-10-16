<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('admin.css')

    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            color: #f1c40f;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-container {
            background-color: #34495e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .form-container label {
            font-weight: bold;
            color: #ecf0f1;
        }

        .form-control {
            background-color: #2c3e50;
            border: 1px solid #1abc9c;
            color: #ecf0f1;
            border-radius: 8px;
            transition: border-color 0.2s ease-in-out;
        }

        .form-control:focus {
            background-color: #2c3e50;
            border-color: #16a085;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #1abc9c;
            border-color: #1abc9c;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #16a085;
            border-color: #16a085;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease-in-out;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: scale(1.05);
        }

        .alert-success {
            background-color: #27ae60;
            border-color: #27ae60;
            color: #ecf0f1;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            background-color: #34495e;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .gallery-container img {
            height: 200px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .gallery-container img:hover {
            transform: scale(1.05);
        }

        .gallery-container .btn-danger {
            margin-top: 10px;
            display: block;
            text-align: center;
            width: 50%;
        }

        .btn-close {
            color: #ecf0f1;
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <h1>Image Gallery Upload</h1>

                <div class="gallery-container">

                    @foreach ($gallary as $gallary)
                        <div class="col-md-4">
                            <img src="/Upload_image/{{$gallary->image}}" alt="{{ $gallary->image }}">

                            <!-- Replace the anchor link with a form to handle DELETE request -->
                            <form action="{{ url('delete_gallary', $gallary->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Image</button>
                            </form>
                        </div>
                    @endforeach
                </div>


                <div class="form-container">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.footer')
</body>
</html>
