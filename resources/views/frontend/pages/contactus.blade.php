@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_contact_title)
@section('meta_description', $dashboard_composer->meta_contact_description)
@section('canonical_url', $dashboard_composer->canonical_url_contact)
@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('{{ asset('images/main/' . $dashboard_composer->contactus_banner_image) }}'); background-size: cover; background-position: center;"alt="{{$dashboard_composer->contactus_banner_image}}">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Contact Us</h1>
   
  </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid py-5 mt-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h5 class="text-primary">Get In Touch</h5>
      <h1 class="mb-3">{{$dashboard_composer->contact_us_title}}</h1>
      <p class="mb-2">{{$dashboard_composer->contact_us_sub}}</p>
    </div>

    <div class="contact-detail">
      <div class="row g-5 mb-5 justify-content-center">
        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
          <div class="d-flex bg-light p-3 rounded">
            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
              <i class="fas fa-map-marker-alt text-white"></i>
            </div>
            <div class="ms-3"style="max-width: calc(100% - 64px);">
              <h4 class="text-primary"style="word-wrap: break-word;">Address</h4>
              <a href="https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7"
                 target="_blank" class="h5"style="word-wrap: break-word;">{{$dashboard_composer->address}}</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
          <div class="d-flex bg-light p-3 rounded">
            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
              <i class="fa fa-phone text-white"></i>
            </div>
            <div class="ms-3"style="max-width: calc(100% - 64px);">
              <h4 class="text-primary"style="word-wrap: break-word;">Call Us</h4>
              <a class="h5" href="tel:+977-{{$dashboard_composer->telephone}}" target="_blank"style="word-wrap: break-word;">{{$dashboard_composer->telephone}}, </a>
             <a class="h5" href="tel:+977{{$dashboard_composer->mobile}}" target="_blank"style="word-wrap: break-word;">{{$dashboard_composer->mobile}}</a>

            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                            <div class="d-flex bg-light p-3 rounded" >
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                  <div class="ms-3" style="max-width: calc(100% - 64px);">
                                    <h4 class="text-primary" style="word-wrap: break-word;">Email Us</h4>
                                    <a href="mailto:{{$dashboard_composer->email}}"
                                     target="_blank" class="h5" style="word-wrap: break-word;">{{$dashboard_composer->email}}</a>
                                </div>
                              
                            </div>
                        </div>
      </div>
                    <div class="row g-5" style="padding-bottom: 25px;">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s" >
                            <div class="g-5 rounded contact-map" style="height:320px">
                                <iframe class="rounded w-100 h-100" src="{{$dashboard_composer->googlemap}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div style="margin: 25px;">
                            <ul class="list-unstyled" style="max-width: calc(100%);word-wrap: break-word;">
<li >
<h5>Information Technology Concerns Pvt. Ltd.</h5>
</li>

<li><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;{{$dashboard_composer->address}}</li>
<li><i class="fa-solid fa-tty"aria-hidden="true"></i>&nbsp; {{$dashboard_composer->telephone}},&nbsp;{{$dashboard_composer->mobile}}</li>
<li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{$dashboard_composer->email}}</li>
</ul>
</div>
                        </div>

                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">  
                        <div class="g-5">
                    <div class="text-center mx-auto pb-1 wow fadeIn" data-wow-delay=".3s" >
                    <h3 class="mb-3">We’d love to hear from you</h3>
                    <p class="mb-2" style="text-align: justify;">Please use the following form to contact us with any questions or concerns. One of our representatives will get back to you as soon as possible.</p>
                     </div>
                     </div>
         <section id="contact-form">
          <form class="contact-form rounded" method="POST" action="{{route('enquirySave')}}" id="contactForm1">
            @csrf
            <div class="rounded contact-form">
              <div class="mb-4">
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
              </div>
              <div class="mb-4">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
              </div>
              <div class="mb-4">
                <input type="text" class="form-control" placeholder="Phone" id="Phone" name="phone" required>
              </div>
              <div class="mb-4">
                <textarea class="form-control" placeholder="Message!" id="message" name="message" style="height: 116px;" required></textarea>
              </div>
                 <div class="form-group mb-2">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                    </div>
                  <button type="submit" class="btn bg-primary text-white py-3 px-5">Send Message</button>
              <div class="contact-result">
                @if(session('message'))
                <div class="alert alert-info alert-dismissible" id="successMessage">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{session('message')}}
                </div>
                @endif
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible" id="errorMessage">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{session('errors')}}
                </div>
                @endif
              </div>
            </div>
          </form>
          </section>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
