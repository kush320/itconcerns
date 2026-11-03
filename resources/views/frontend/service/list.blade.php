@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_service_title)
@section('meta_description', $dashboard_composer->meta_service_description)
@section('canonical_url', $dashboard_composer->canonical_url_service)

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('images/main/{{ $dashboard_composer->services_banner_image }}');">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Services</h1>
  
  </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-fluid service py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h5 class="text-primary">Our Services</h5>
      <h1>{{ $dashboard_composer->services_title }}</h1>
    </div>
    <div class="row g-5 services-inner">
      @foreach($services as $service)
      <div class="col-md-3 col-lg-3 wow fadeIn" data-wow-delay=".3s">
     
        <div class="service-card shadow h-100">
          <div class="service-img">
            <a href="{{ route('serviceDetails', $service->slug) }}">
              <img src="{{ asset('images/main/' . $service->image) }}" class="img-fluid" alt="{{$service->title}}" width="243" height="162">
            </a>
          </div>
          <div class="service-content pb-2">
            <h4 class="service-title">
              <a href="{{ route('serviceDetails', $service->slug) }}">{{ $service->title }}</a>
            </h4>
            <a href="{{ route('serviceDetails', $service->slug) }}">
            <p class="service-desc" style="text-align:justify;">{!! Str::limit($service->short_description, 150) !!}</p></a>
          </div>    
        </div>
     
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Service End -->

@endsection
