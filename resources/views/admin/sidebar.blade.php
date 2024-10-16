<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="admin/index.html"> <i class="icon-home"></i>Home </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('create_room')}}">Add Rooms</a></li>
                <li><a href="{{url('view_room')}}">View Rooms</a></li>
              </ul>
            </li>
            <li>
                <a href="{{url('bookings')}}"> <i class="fas fa-calendar-check"></i> Bookings</a>
            </li>
            
            <li>
                <a href="{{url('view_gallary')}}"> <i class="fas fa-images"></i> Gallery</a>
            </li>
            
            <li>
                <a href="{{url('all_messages')}}"> <i class="fas fa-envelope"></i> Messages</a>
            </li>
            

    </ul>
  </nav>
