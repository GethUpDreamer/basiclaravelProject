<footer>
    <div class="footer">
       <div class="container">
          <div class="row">
             <div class=" col-md-4">
                <h3>Contact US</h3>
                <ul class="conta">
                   <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                   <li><i class="fa fa-mobile" aria-hidden="true"></i> +212068-1786054</li>
                   <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> anasamin817@gmail.com</a></li>
                </ul>
             </div>
             <div class="col-md-4">
                <h3>Menu Link</h3>
                <ul class="link_menu">
                   <li class="active"><a href="#">Home</a></li>
                   <li><a href="about.html"> about</a></li>
                   <li><a href="room.html">Our Room</a></li>
                   <li><a href="gallery.html">Gallery</a></li>
                   <li><a href="blog.html">Blog</a></li>
                   <li><a href="contact.html">Contact Us</a></li>
                </ul>
             </div>
             <div class="col-md-4">
                <h3>News letter</h3>
                <form class="bottom_form">
                   <input class="enter" placeholder="Enter your email" type="text" name="email">
                   <button class="sub_btn">subscribe</button>
                </form>
                <ul class="social_icon">
                   <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
             </div>
          </div>
       </div>
       <div class="copyright">
          <div class="container">
             <div class="row">
                <div class="col-md-10 offset-md-1">

                    <p>
                        &copy; {{ date('Y') }} Mohemmed dadah. All rights reserved.
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> | 
                        <a href="{{ url('/terms-of-service') }}">Terms of Service</a>
                    </p>

                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
