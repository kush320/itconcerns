@extends('frontend.layouts.app')
@section('meta_title', $details->meta_title)
@section('meta_description', $details->meta_description)
@section('keywords', $details->keyword)
@section('meta_keyphrase', $details->meta_keyphrase)
@section('canonical_url', $details->canonical_url)
@section('content')
<?php
function splitParagraphs($text)
{
  $pattern = '/,(?![^()]*\))/';
  $parts = preg_split($pattern, $text);
  return array_map('trim', $parts);
}
?>
<style>
  .training-section .np-training .trainer-details .t-details-img:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-top: 30px solid transparent;
    border-right: 30px solid #fff !important;
    border-bottom: 30px solid transparent;
    z-index: 2;
    /* Ensure it appears in front of col-lg-9 */
    transition: all 0.5s ease;
  }
</style>
<div class="container-fluid career pt-5 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <h1 style="color: #08182e;">{{ $details->course_title }}</h1>
        <div class="featured-desc">
          <p>Duration: {{ $details->duration }}</p>
                 <p>Date: {{ \Carbon\Carbon::parse($details->date)->format('d F Y') }}</p>
          <p>Time: {{ $details->time }}</p>
          <p>Venue: {{ $details->venue }}</p>
        </div>
        <div class="career-list">
          {!! $details->description !!}
        </div>
        <div class="pre-requisite">
          <h5 style="color:#f79d18;">Prerequisites</h5>
          <ul id="pre-requisite-list">
            @php

        $paragraphs = splitParagraphs($details->pre_requisite);


      @endphp

            @foreach($paragraphs as $paragraph)
        <li>{{ $paragraph }}</li>
      @endforeach
          </ul>
        </div>

        @if($details instanceof App\Models\Training && $details->trainers->count())
      <div class=" py-4 training-section">
        <div class="container">
        <div class="text-center mx-auto " data-wow-delay="0.3s" style="max-width: 600px;">
          <h2 class="wow fadeInDown text-primary"> Trainer Details</h2>
          <h4 class="wow fadeInDown text-secondary">Expert Guidance for Your Success</h4>
        </div>
        <div class="row align-items-center np-training py-4"
          style="background: linear-gradient(90deg, rgb(242, 246, 251) 50%, rgb(202, 202, 202) 100%);">
          @foreach ($details->trainers as $trainer)
        <div class="col-lg-3 col-md-4 col-sm-12 text-center mb-4 mb-lg-0 trainer-details">
        <div class="trainer-image-wrapper wow fadeInLeft t-details-img " data-wow-delay="0.2s"
        style="position: relative;">
        <img id="imgTrainer" src="{{ asset('/images/main/' . $trainer->image) }}" alt="{{$trainer->name}}"
        class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">
        <h4 class="trainer-name wow fadeInUp mt-4" data-wow-delay="0.3s"
        style="font-size: 24px; color: #2c3e50;">{{$trainer->name}}</h4>
        <div class="trainer-social-icons wow fadeInUp mt-3 d-flex justify-content-center"
        data-wow-delay="0.4s">
        <a href="{{$trainer->facebook}}"
          class="btn-secondary nav-fill btn btn-square rounded-circle me-2"><i
          class="fab fa-facebook-f text-white"></i></a>

        <a href="{{$trainer->linkedin}}"
          class="btn-secondary nav-fill btn btn-square rounded-circle me-2"><i
          class="fab fa-linkedin-in text-white"></i></a>

        </div>
        </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12">
        <div class="trainer-details-text wow fadeInRight " data-wow-delay="0.5s"
        style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); position: relative;">
        <p class="trainer-bio" style="text-align: justify; font-size: 17px; color: black;">
        {!!$trainer->description!!}
        </p>
        </div>
        </div>
      @endforeach  

        </div>
        </div>
      </div>
    @endif
        <div class="g-5 py-5">
          <div class="text-center mx-auto pb-1 wow fadeIn" data-wow-delay=".3s">
            <h5 class=" py-2 mb-4" style="text-align: justify;color:black;font-weight:bold;">
              Please fill in the form below for registration.</h5>
          </div>

          
          <section id="training">
          <form class="contact-form rounded" method="POST" action="{{ route('saveTraining') }}" id="contactForm4">
    @csrf

            <div class="row">
              <div class="form-group col-md-6">
                <div class="mb-4">
                  <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="mb-4">
                  <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="mb-4">
                  <input type="text" class="form-control" placeholder="Phone" id="Phone" name="phone" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="mb-4">
                  <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                </div>
              </div>
              <div class="mb-4">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
              </div>

              <div class="mb-4">
                <input type="text" class="form-control" placeholder="Your Current Job Role ?" id="role" name="role"
                  required>
              </div>
            </div>
            <div class=" mb-4">
              <textarea class="form-control" placeholder="Message!" id="message" name="message"
                style="height: 116px;" required></textarea>
            </div>
            <div class="form-group mb-2">
                 <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                   </div>
      
       <div class="form-group mb-2">
            <button type="submit" class="btn bg-primary text-white py-3 px-5">Send Message</button>
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
   
</form>
          </section>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection