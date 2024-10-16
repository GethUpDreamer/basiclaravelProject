<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic Meta Tags -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Keto</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      @include('home.css')
   </head>

   <!-- Body -->
   <body class="main-layout">

      <header>
         @include('home.header')
      </header>

      <div class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered.</p>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-8">
                  <div id="serv_hover" class="room">
                     <div style="padding: 20px" class="room_img">
                        <img style="height: 200px; width:800px" src="/Upload_image/{{$room->image}}" alt="Room Image"/>
                     </div>
                     <div class="bed_room">
                         <h3>{{$room->room_title}}</h3>
                        <p style="padding: 12px">{{$room->description}}</p>

                        <h3>Free Wifi {{$room->wifi}}</h3>

                        <h4 style="padding:12px">Room Type: {{$room->room_type}}</h4>

                        <h4 style="padding:12px">Room Price: {{$room->price}}</h4>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                     <h1 style="text-align: center; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Book Room</h1>

                     <!-- Display validation errors -->
                     @if ($errors->any())
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     @endif

                     @if (session('message'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">X</button>
                         {{ session('message') }}
                     </div>
                    @endif

                    <form action="{{ url('add_booking', $room->id) }}" method="POST">
                        @csrf

                        <div class="card-body">
                           <div class="mb-6">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" name="name" class="form-control rounded" id="name"
                              @if (Auth::id()) value="{{Auth::user()->name}}"
                              @endif
                              >
                           </div>
                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control rounded" id="email"
                              @if (Auth::id()) value="{{Auth::user()->email}}"
                              @endif
                              >
                           </div>
                           <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="number" name="phone" class="form-control rounded" id="phone"
                              @if (Auth::id()) value="{{Auth::user()->phone}}"
                              @endif>
                           </div>
                           <div class="mb-3">
                              <label for="startDate" class="form-label">Start Date</label>
                              <input type="date" name="startDate" class="form-control rounded" id="startDate">
                           </div>
                           <div class="mb-3">
                              <label for="endDate" class="form-label">End Date</label>
                              <input type="date" name="endDate" class="form-control rounded" id="endDate">
                           </div>
                           <input type="submit" class="btn btn-outline-primary" value="Book Room">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer -->
      @include('home.footer')

 <script type="text/javascript">
         $(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
               month = '0' + month.toString();
            if (day < 10)
               day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
  
         });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   </body>
</html>
