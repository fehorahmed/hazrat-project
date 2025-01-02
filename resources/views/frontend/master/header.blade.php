 <!-- Header Area -->
 <header class="header">
     <!-- Topbar -->
     <div class="topbar">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-5 col-12">
                     <!-- Contact -->
                     <ul class="top-link">
                         <li><a href="#">About</a></li>
                         <li><a href="#">Doctors</a></li>
                         <li><a href="#">Contact</a></li>
                         <li><a href="#">FAQ</a></li>
                     </ul>
                     <!-- End Contact -->
                 </div>
                 <div class="col-lg-6 col-md-7 col-12">
                     <!-- Top Contact -->
                     <ul class="top-contact">
                         <li><i class="fa fa-phone"></i>+880 1234 56789</li>
                         <li><i class="fa fa-envelope"></i><a
                                 href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                     </ul>
                     <!-- End Top Contact -->
                 </div>
             </div>
         </div>
     </div>
     <!-- End Topbar -->
     <!-- Header Inner -->
     <div class="header-inner">
         <div class="container">
             <div class="inner">
                 <div class="row">
                     <div class="col-lg-2 col-md-2 col-12">
                         <!-- Start Logo -->
                         <div class="logo">
                             <a href="{{ route('home') }}"><img src="{{ asset('front-assets') }}/img/logo.png"
                                     alt="#"></a>
                         </div>
                         <!-- End Logo -->
                         <!-- Mobile Nav -->
                         <div class="mobile-nav"></div>
                         <!-- End Mobile Nav -->
                     </div>
                     <div class="col-lg-7 col-md-7 col-12">
                         <!-- Main Menu -->
                         <div class="main-menu">
                             <nav class="navigation">
                                 <ul class="nav menu">
                                     <li class="active"><a href="#">Home </a></li>
                                     {{-- <li class="active"><a href="#">Home <i class="icofont-rounded-down"></i></a>
                                         <ul class="dropdown">
                                             <li><a href="index.html">Home Page 1</a></li>
                                         </ul>
                                     </li> --}}
                                     {{-- <li><a href="#">Doctos </a></li> --}}
                                     {{-- <li><a href="#">Services </a></li> --}}
                                     <li><a href="#">Courses <i class="icofont-rounded-down"></i></a>
                                         <ul class="dropdown">
                                             @foreach (getMenuCourses() as $item)
                                                 <li><a href="{{ route('course.detail',$item->slug) }}">{{ $item->name }}</a></li>
                                             @endforeach

                                         </ul>
                                     </li>
                                     <li><a href="#">Skill Development <i class="icofont-rounded-down"></i></a>
                                         <ul class="dropdown">
                                             @foreach (getMenuSkillDevelopments() as $item)
                                                 <li><a href="{{ route('development.course.detail',$item->slug) }}">{{ $item->name }}</a></li>
                                             @endforeach

                                         </ul>
                                     </li>
                                     <li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
                                         <ul class="dropdown">
                                             <li><a href="blog-single.html">Blog Details</a></li>
                                         </ul>
                                     </li>
                                     <li><a href="contact.html">Contact Us</a></li>
                                 </ul>
                             </nav>
                         </div>
                         <!--/ End Main Menu -->
                     </div>
                     <div class="col-lg-3 col-md-3 col-12">
                         <div class="get-quote">
                             @auth('trainee')
                                 <a href="{{ route('trainee.dashboard') }}" class="btn">Dashboard </a>
                                 <a href="{{ route('logout') }}" class="btn">Logout </a>
                             @else
                                 <a href="{{ route('trainee.login') }}" class="btn">Login </a>
                                 <a href="{{ route('trainee.register') }}" class="btn">Registration</a>
                             @endauth

                         </div>
                         {{-- <div class="get-quote">
                             <a href="appointment.html" class="btn">Registration</a>

                         </div> --}}

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ End Header Inner -->
 </header>
 <!-- End Header Area -->
