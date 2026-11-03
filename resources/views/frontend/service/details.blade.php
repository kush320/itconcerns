@extends('frontend.layouts.app')
@section('meta_title', $details->meta_title)
@section('meta_description', $details->meta_description)
@section('keywords', $details->keyword)
@section('meta_keyphrase', $details->meta_keyphrase)
@section('canonical_url', $details->canonical_url)

@section('content')

<style>
.custom-select-arrow {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>') no-repeat right 0.75rem center;
  padding-right: 2.5rem;
  background-size: 1rem;
}

.custom-select-arrow:focus {
  outline: none;
}
</style>

      <div class="container py-4">
    <div class="row">

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-4">
<div class="right-nav-menu " style="position: -webkit-sticky;
  position: sticky;
  top: 70px;">
<div class="recent-post r-margin">
<h4>Our Services</h4>
</div>
<ul class="list-unstyled">
@foreach($recentServices as $service)
<li><a href="{{ route('serviceDetails', $service->slug) }}">
    {{$service->title}}</a>
</li>
@endforeach

</ul>
                  <div class="contact-sidebar" style="border: 1px solid #08182e;margin-bottom: 20px;margin-top: 20px;">
                    <div class="recent-post" style="text-align: center;color: #ffffff;width: 100%;padding: 10px 5px 5px 5px;">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="contact-box" style="display: flex;">
                        <div class="contact-l">
                            <i class="fa fa-globe" aria-hidden="true" style="font-size: 40px;color: #f79d18;padding: 14px 0px 0px 15px;"></i>
                        </div>
                        <div class="contact-r" style="width: calc(100% - 60px);padding: 5px;float: right;">
                            <p style="font-size: 15px;text-align: justify;">Ready to learn more about how we can move your business forward?</p>
                        </div>
                    </div>
                    <a class="btn btn-secondary" href="{{ route('getPages','contact-us') }}" style="margin: 0;width: 100%;border: none;font-weight: 600;border-radius: 0;">Contact Us</a>
                </div>
                </div>
             </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mb-4">
                <div class="service-detail">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="service-dl">
                                <h3>{{ $details->title }}</h3>
                                <img src="{{ asset('/images/main/' . $details->image) }}"alt="{{$details->title}}">
                                <!--<p style="text-align:justify">-->
                                <!--    <span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">-->
                                <!--        <span><b><span style="font-size:16px">{{ $details->short_description }}</span></b>-->
                                <!--    </span>-->
                                <!--</p>-->
                                <p style="text-align:justify">
                                    <span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">
                                        <span >{!! $details->description !!}</span>
                                    </span>
                                </p>
                                <p style="text-align:justify">&nbsp;</p>
                                <p style="text-align:justify"><em>Looking for Professional IT Service? <a href="{{ route('getPages','contact-us') }}">Contact us</a> today.</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="text-center mx-auto pb-5">
                <h5 class="text-primary">Get In Touch</h5>
                <h1>{{ $dashboard_composer->contact_us_title }}</h1>
                <p>{{ $dashboard_composer->contact_us_sub }}</p>
            </div>
            
            <div class="contact-detail ">
                <!-- Contact Information -->
                <div class="row g-5 mb-5 justify-content-center">
                    <!-- Address -->
                    <div class="col-xl-4 col-lg-6 mb-4 mb-lg-0">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3"style="max-width: calc(100% - 64px);">
                                <h4 class="text-primary"style="word-wrap: break-word;">Address</h4>
                                <a href="https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7" target="_blank" class="h5" style="word-wrap: break-word;">{{ $dashboard_composer->address }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="col-xl-4 col-lg-6 mb-4 mb-lg-0">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3" style="max-width: calc(100% - 64px);">
                                <h4 class="text-primary"style="word-wrap: break-word;">Call Us</h4>
                                <a class="h5" href="tel:+977-{{ $dashboard_composer->telephone }}" target="_blank"style="word-wrap: break-word;">{{ $dashboard_composer->telephone }},</a>
                                <a class="h5" href="tel:+977{{ $dashboard_composer->mobile }}" target="_blank"style="word-wrap: break-word;">{{ $dashboard_composer->mobile }}</a>

                            </div>
                        </div>
                    </div>
                    <!-- Email -->
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
                
                <!-- Contact Form -->
                 <div class="row g-5" style="padding-bottom: 25px;">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s" >
                            <div class="g-5 rounded contact-map" style="height:320px">
                                <iframe class="rounded w-100 h-100" src="{{$dashboard_composer->googlemap}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        <div style="margin: 25px;">
                            <ul class="list-unstyled" style="max-width: calc(100%);word-wrap: break-word;">
                                <li><h5>Information Technology Concerns Pvt. Ltd.</h5></li>
                                <li><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;{{ $dashboard_composer->address }}</li>
                                <li><i class="fa-solid fa-tty"aria-hidden="true"></i>&nbsp; {{$dashboard_composer->telephone}},&nbsp;{{$dashboard_composer->mobile}}</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{ $dashboard_composer->email }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">  
                        <div class="text-center mx-auto pb-1">
                            <h3 class="mb-3">We’d love to hear from you</h3>
                            <p class="mb-2">Please use the following form to contact us with any questions or concerns. One of our representatives will get back to you as soon as possible.</p>
                        </div>
                        <section id="contact">
                        <form class="contact-form rounded" method="POST" action="{{ route('quoteSave') }}" id="contactForm2">
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
                                    <select class="form-control custom-select-arrow" id="inquiry" name="inquiry" required>
                                        <option value="">Select Inquiry</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->title }}" {{ $service->title == $service_id ? 'selected' : '' }}>{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" placeholder="Message!" id="message" name="message" style="height: 116px;" required></textarea>
                                </div>
                                  <div class="col-12">
              <div class="form-group mb-2">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                  </div>
                </div>
                
              <button type="submit" class="btn bg-primary text-white py-3 px-5">Send Message </button>
                                <div class="text-start">
                                    <div class="contact-result">
                                        @if(session('message'))
                                            <div class="alert alert-info alert-dismissible" id="successMessage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        @if(session('errors'))
                                            <div class="alert alert-danger alert-dismissible" id="errorMessage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ session('errors') }}
                                            </div>
                                        @endif
                                    </div>
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

    <script>
    function onSubmit(token) {
        document.getElementById("contactForm2").submit();
    }
</script>
@endsection
