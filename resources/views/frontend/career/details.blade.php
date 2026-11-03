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
<div class="container-fluid career py-5 mb-3">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <h1 style="color: #08182e;">{{ $details->title }}</h1>
        <div class="featured-desc">
          <p>No. of Vacancies: {{ $details->number }}</p>
          <p>Posted date: {{ $details->created_at->format('M d, Y') }}</p>
          <p>Job Type: {{ $details->job_type }}</p>
          <p>Shift/Hours: {{ $details->shift }}</p>
          <p>Career Level: {{ $details->career_level }}</p>
        </div>
        <div class="career-list">
          {!! $details->description !!}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="right-nav-menu " style="position: -webkit-sticky;
  position: sticky;
  top: 70px;">
          <div class="recent-post r-margin">
            <h4>Recent Careers</h4>
          </div>
          <ul class="list-unstyled">
            @foreach($recentCareer as $career)
        <li><a href="{{ route('careerDetails', $career->slug) }}">
          {{$career->title}}</a>
        </li>
      @endforeach
          </ul>

        </div>
      </div>
    </div>
  </div>
</div>
  <div class="container-fluid px-0">
            <div class="container">
                                                <div class="contact-detail" >
                    <div class="row g-5 mb-5 justify-content-center">
                                                           
                        <div class="col-lg-12 wow fadeIn" data-wow-delay=".5s">  
                        <div class="g-5">
                    <div class="text-center mx-auto pb-1 wow fadeIn" data-wow-delay=".3s" >
                    <h3 class="mb-3">Join Our Team</h3>
                    <p class="mb-2" style="text-align: center;">
                      
               Interested in a career with us? Reach out below for more information, and we’ll get back to you promptly.
</div>
                     </div>
           
    <form id="contactForm3" class="contact-form rounded" method="POST" action="{{ route('savedetail') }}" enctype="multipart/form-data">
    @csrf
    <div class="rounded contact-form row">
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
        </div>
        <div class="col-md-6 mb-4">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
        </div>
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
        </div>
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" required>
        </div>
        <div class="col-md-6 mb-4">
            <textarea class="form-control" placeholder="Message!" id="message" name="message" style="height: 116px;" required></textarea>
        </div>
        <div class="col-md-6 mb-4">
            <select class="form-control custom-select-arrow" id="inquiry" name="inquiry" required>
                <option value="">Select Inquiry</option>
                @foreach($careers as $data)
                    <option value="{{ $data->title }}" {{ $data->title == $career_id ? 'selected' : '' }}>{{ $data->title }}</option>
                @endforeach
            </select>
        </div>
     
        <div class="col-md-12 mb-4">
            <label for="cv">Please attach your CV here</label>
            <input type="file" class="form-control with-grey-bg" name="cv" id="cv">
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
    </div>
</form>

        </div>
      </div>
    </div>
  </div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection