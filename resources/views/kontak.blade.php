 @extends('layouts.master')

 @section('content')
     <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
         style="background-image: url(/perpus/img-1.jpg);">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <h1>Contact Us</h1>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Breadcrumb -->

     <!-- Start Contact Info
                                                                                                                                ============================================= -->
     <div class="contact-info-area default-padding">
         <div class="container">
             <div class="row">
                 <!-- Start Contact Info -->
                 <div class="contact-info">
                     <div class="col-md-4 col-sm-4">
                         <div class="item">
                             <div class="icon">
                                 <i class="fas fa-mobile-alt"></i>
                             </div>
                             <div class="info">
                                 <h4>Call Us</h4>
                                 <span>{{ $about->telepon }}</span>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-sm-4">
                         <div class="item">
                             <div class="icon">
                                 <i class="fas fa-map-marker-alt"></i>
                             </div>
                             <div class="info">
                                 <h4>Address</h4>
                                 <span>{{ $about->alamat }}</span>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-sm-4">
                         <div class="item">
                             <div class="icon">
                                 <i class="fas fa-envelope"></i>
                             </div>
                             <div class="info">
                                 <h4>Email Us</h4>
                                 <span>{{ $about->email }}</span>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- End Contact Info -->

                 <div class="seperator col-md-12">
                     <span class="border"></span>
                 </div>

                 <!-- Start Maps & Contact Form -->
                 <div class="maps-form">
                     <div class="col-md-6 maps">
                         <h3>Our Location</h3>
                         <div class="google-maps">
                             <iframe src="{{ $about->maps }}" width="600" height="450" style="border:0;"
                                 allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         </div>
                     </div>
                     <div class="col-md-6 form">
                         <div class="heading">
                             <h3>PRIMABACA</h3>
                             <p>
                                 {{ $about->alamat }}
                             </p>
                         </div>
                     </div>
                     <div class="seperator col-md-6">
                         <span class="border"></span>
                     </div>
                     <div class="col-md-6 form">
                         <div class="f-item address">
                             <h4>Address</h4>
                             <ul>
                                 <li>
                                     <i class="fas fa-envelope"></i>
                                     <p>Email <span><a href="{{ $about->email }}">{{ $about->email }}</a></span></p>
                                 </li>
                                 <li>
                                     <i class="fas fa-map"></i>
                                     <p>Office <span>{{ $about->alamat }}</span></p>
                                 </li>
                             </ul>
                             <div class="opening-info">
                                 <h5>Opening Hours</h5>
                                 <ul>
                                     <li> <span> Mon - Tues : </span>
                                         <div class="pull-right"> {{ $about->jam_buka_1 }} </div>
                                     </li>
                                     <li> <span> Wednes - Thurs :</span>
                                         <div class="pull-right"> {{ $about->jam_buka_2 }} </div>
                                     </li>
                                     <li> <span> Sun : </span>
                                         <div class="pull-right closed"> Closed </div>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- End Maps & Contact Form -->

             </div>
         </div>
     </div>
 @endsection
