@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_partners_title)
@section('meta_description', $dashboard_composer->meta_partners_description)
@section('canonical_url', $dashboard_composer->canonical_url_partners)
@section('content')

<style>
 

.partner-card {
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.partner-card:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

</style>
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('{{ asset('images/main/' . $dashboard_composer->partners_banner_image) }}');"alt="Banner Image">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Our Partners</h1>
    
  </div>
</div>

<div class="container-fluid service py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h1 class="text-primary">Partners in Successs</h1>
      <p>Foster growth through expert-led partnerships, tailored for enduring success and mutual advancement.</p>
    </div>
    <div class="row g-5 services-inner">
      @foreach($partners as $partner)
      <div class="col-md-3 col-lg-3 wow fadeIn" data-wow-delay=".3s">
      <a href="{{$partner->company_link}}" target="_blank" class="services-link">
        <div class="partner-card shadow h-100">
          <div class="partner-img">
            <a href="{{$partner->company_link}}" target="_blank">
              <img src="{{ asset('images/main/' . $partner->image) }}" class="img-fluid" alt="{{$partner->name}}">
            </a>
          </div> 
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection