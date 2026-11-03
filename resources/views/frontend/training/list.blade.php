@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_training_title)
@section('meta_description', $dashboard_composer->meta_training_description)
@section('canonical_url', $dashboard_composer->canonical_url_training)
@section('content')
<style>
  .widget-post-item-border {
    border: 2.5px dotted #f79d18;
  }
</style>
<div class="page-header">
  <div class="text-center py-6"
    style="background-image: url('{{ asset('images/main/' . $dashboard_composer->training_banner_image) }}');"alt="{{$dashboard_composer->training_banner_image}}">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Trainings</h1>
  </div>
</div>

<div class="container-fluid career py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h1 class="text-primary">Skill Up with Experts</h1>
      <p>Enhance your expertise with targeted training, led by industry professionals to help you succeed</p>
    </div>
    <div class="row g-4 justify-content-center" style="display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap; ">
      @foreach($details as $data)
      <div class="col-sm-12 widget-post-item-border shadow" style="background:#f9f9f9;">
      <div class="job-item" style="margin: 10px;">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="job-item_meta"
          style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;margin-bottom: 15px;">
          <span class="job-item_type"
            style="font-size: 13px;text-transform: capitalize;background-color: #f79d18;color: #ffffff;padding: 3px 8px;border-radius: 2px;margin-right: 20px;">{{ $data->duration }}</span>
          </div>
          <h4 class="job-item_title" style="color:#08182e;">{{ $data->course_title }}</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <p class="job-item_desc" style="margin-bottom:0px;text-align:justify;">{!!$data->short_description!!}</p>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 d-flex align-items-center justify-content-end btn-wrap">
          <a href="{{ route('trainingDetails', $data->slug) }}" class="btn btn-secondary text-white">
          <span>Apply Now</span>
                     
           
          <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
        </div>
      </div>
      </div>
    @endforeach
    </div>
  </div>
</div>

@endsection