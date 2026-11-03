@extends('frontend.layouts.app')
@section('content')
        
        <!-- Page Header Start -->
        <div class="page-header">
  <div class="text-center py-6" style="background-image: url('images/main/{{ $dashboard_composer->projects_banner_image }}');"alt="{{$dashboard_composer->projects_banner_image}}">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Projects</h1>
   
  </div>
</div>

   

        <!-- Project Start -->
        <div class="container-fluid project  my-5">
            <div class="container ">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Project</h5>
                    <h1>Our Recently Completed Projects</h1>
                </div>
                <div class="row g-5">
                @foreach($details as $data)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{asset('images/main/'.$data->image)}}" class="img-fluid w-100 rounded" alt="Project Image">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text-secondary">{{$data->title}}</h4>
                                        <p class="m-0 text-white">{{$data->subtitle}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Project End -->
@endsection