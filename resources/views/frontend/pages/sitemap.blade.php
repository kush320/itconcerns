@extends('frontend.layouts.app')

@section('content')
<section class="container-fluid mt-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1 class="text-primary">Sitemap</h1>
        </div>

        <!-- Sitemap Lists -->
        <div class="contact-detail">
            <div class="row g-5 mb-5 justify-content-center">
                <!-- Company Section -->
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Company</h2>
                    <ul class="site-map-links" style="list-style: none; margin-bottom: 15px;">
                        <li><a href="{{ route('getPages', 'about-us') }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> About Us</a></li>
                        <li><a href="{{ route('getPages', 'contact-us') }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Contact Us</a></li>
                        <li><a href="{{ route('serviceList') }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Our Services</a></li>
                        <li><a href="{{ route('resourceList') }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Latest Resources</a></li>
                        <li><a href="{{ route('careerList') }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Careers</a></li>
                        <li><a href="{{route('productList')}}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Products</a></li>
                        <li><a href="{{route('partnerList')}}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Partners</a></li>
                        <li><a href="{{route('trainingList')}}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Trainings</a></li>
                        <li><a href="{{route('downloads')}}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Downloads</a></li>
                    </ul>
                </div>

                <!-- Services Section -->
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Services</h2>
                    <ul class="site-map-links" style="list-style: none; margin-bottom: 15px;">
                        @foreach($services as $service)
                            <li><a href="{{ route('serviceDetails', $service->slug) }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> {{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Careers Section -->
                      @if($careers->isNotEmpty())
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Careers</h2>
                    <ul class="site-map-links" style="list-style: none; margin-bottom: 15px;">
                        @foreach($careers as $career)
                            <li><a href="{{ route('careerDetails', $career->slug) }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> {{ $career->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
              @endif

                <!-- Trainings Section -->
              @if($trainings->isNotEmpty())
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Trainings</h2>
                    <ul class="site-map-links" style="list-style: none; margin-bottom: 15px;">
                        @foreach($trainings as $training)
                            <li><a href="{{ route('trainingDetails', $training->slug) }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> {{ $training->course_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
              @endif
              
                     <!-- Tools Section -->
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Tools</h2>
                    <ul class="site-map-links" style="list-style: none; margin-bottom: 15px;">
                       <li><a href="https://itconcerns.com.np/IPv4-calculator"><i class="fas fa-angle-right" style="color:#f79d18;"></i> IPv4-Subnet Calculator Tool</a></li>
                  <li><a href="https://itconcerns.com.np/passwordgenerator"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Password Generator Tool</a></li>
                   <li><a href="https://itconcerns.com.np/generate-hash/"><i class="fas fa-angle-right" style="color:#f79d18;"></i> Hash Generator and Matcher Tool</a></li>
                    </ul>
                </div>

                <!-- Resources Section -->
                <div class="site-map__list--item shadow" style="border: 2.5px dotted #f79d18;">
                    <h2 class="site-map-title" style="color:#f79d18;">Resources</h2>
                    <ul class="site-map-links" style="list-style: none;">
                        @foreach($resource as $resources)
                            <li style="padding: 5px;"><a href="{{ route('resourceDetails', $resources->slug) }}"><i class="fas fa-angle-right" style="color:#f79d18;"></i> {{ $resources->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .site-map__list--item {
        padding: 20px;
        margin-bottom: 20px;
    }

    .site-map-links {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    
    @media (max-width: 768px) {
        .site-map-links {
            grid-template-columns: 1fr; 
        }
    }

    @media (max-width: 576px) {
        .site-map__list--item {
            padding: 15px;
        }

        .site-map-title {
            font-size: 1.5rem;
        }

        .site-map-links li {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
