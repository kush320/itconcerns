@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_title)
@section('meta_description', $dashboard_composer->meta_description)
@section('keywords', $dashboard_composer->keyword)
@section('meta_keyphrase', $dashboard_composer->meta_keyphrase)
@section('canonical_url', $dashboard_composer->canonical_url)
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

@include('cookie-consent::index')

        <!-- Carousel Start -->
              <div class="container-fluid px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      
        <div class="carousel-inner" role="listbox">
    @foreach($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
           
            <picture>
                <source srcset="{{ asset('images/thumbnail/'.$slider->image) }} 425w" media="(max-width: 425px)" alt="{{ $slider->title }}">
                <source srcset="{{ asset('images/thumbnail/'.$slider->image) }} 768w" media="(min-width: 426px) and (max-width: 768px)" alt="{{ $slider->title }}">
                <source srcset="{{ asset('images/main/'.$slider->image) }} 1920w" media="(min-width: 769px)"  alt="{{ $slider->title }}">
                <img src="{{ asset('images/main/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
            </picture>
   
            <div class="carousel-caption">
                <div class="container carousel-content">
                    <h6 class="text-secondary h4 animated fadeInUp">{{$slider->header}}</h6>
                    <h1 class="text-white display-1 mb-4 animated fadeInRight">{{$slider->title}}</h1>
                    <p class="mb-4 text-white fs-5 animated fadeInDown">{{$slider->subtitle}}</p>                                     
                    <a href="{{$slider->btn_link}}" class="ms-2">
                        <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary carousel-content-btn2 animated fadeInRight">{{$slider->btn_title}}</button>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
 <!-- Carousel End -->

<!--
        <!-- Fact Start -->
       <div class="container-fluid bg-primary py-4">
    <div class="container">
        <div class="row">
            @foreach($customers as $customer)
            <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-secondary counter-value">{{$customer->number}}</h1>&nbsp;&nbsp;&nbsp;
                    <h5 class="mt-1" style="color:white;">{{$customer->title}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> 

        <!-- Fact End -->

        <!-- About Start -->
        <div class="container-fluid py-5 my-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="{{ asset('images/main/' . @$dashboard_composer->about_us_image1) }}" width="328" height="218" class="img-fluid w-75 rounded" alt="{{$dashboard_composer->about_us_image1}}" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="{{ asset('images/main/' . @$dashboard_composer->about_us_image2) }}" width="328" height="218" class="img-fluid w-100 rounded" alt="{{$dashboard_composer->about_us_image2}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h5 class="text-primary">About Us</h5>
                        <h1 style="text-align: left;">{{$dashboard_composer->about_us_title}}</h1>
                        <!--<p class="mb-4"style="text-align: justify;">{{$dashboard_composer->about_us_sub}}</p>-->
                        <p class="mb-4" style="text-align: justify;">{!! Str::limit($dashboard_composer->about_us_description, 850) !!}</p>
                        <div class="btn">
                        <a href="{{route('getPages','about-us')}}" class="btn btn-secondary px-4 py-3 text-white">More Details</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- <div class="container-fluid py-5 my-5" style="background-color: #f8f9fa;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 wow fadeIn" data-wow-delay=".3s">
                        <div class="text-center mb-5">
                            <h1 class="mb-4">Our Mission</h1>
                        </div>
                        <div class="text-center">
                            <p class="lead" style="text-align: justify; line-height: 1.8; color: #333;">
                                Empowering businesses with scalable, secure, and efficient IT solutions that enhance operations, strengthen security, and elevate customer experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<!-- Services Start -->
<div class="container-fluid service mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h5 class="text-primary">Our Services</h5>
      <h1>{{ $dashboard_composer->services_title }}</h1>
    </div>
    <div class="row g-5 services-inner">
      @foreach($services as $service)
      <div class="col-md-3 col-lg-3 wow fadeIn" data-wow-delay=".3s">
      <a href="{{route('serviceDetails', $service->slug)}}" class="services-link">
        <div class="service-card shadow h-100">
          <div class="service-img">
            <a href="{{ route('serviceDetails', $service->slug) }}">
              <img src="{{ asset('images/main/' . $service->image) }}" class="img-fluid" alt="{{$service->title}}">
            </a>
          </div>
          <div class="service-content p-2">
            <h4 class="service-title">
              <a href="{{ route('serviceDetails', $service->slug) }}">{{ $service->title }}</a>
            </h4>
            <p class="service-desc" style="text-align:justify;">{{ Str::limit($service->short_description, 150)}}</p>
          </div>    
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>

        <!-- Services End -->

        <!-- <div class="container-fluid py-5 my-5" style="background: linear-gradient(135deg, #08182e 0%, #1a3a5a 100%);">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h1 class="text-white">Why Choose ITConcerns?</h1>
                </div>
                <div class="row g-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="h-100 p-4 text-center rounded" style="background-color: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                            <div class="mb-3">
                                <i class="fas fa-globe-americas text-white" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-white mb-3">Global Reach, Local Support</h4>
                            <p class="text-white mb-0" style="text-align: justify; line-height: 1.8;">
                                Offices in Nepal, Australia, and Dubai provide faster response and personalized support.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="h-100 p-4 text-center rounded" style="background-color: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                            <div class="mb-3">
                                <i class="fas fa-award text-white" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-white mb-3">Expertise & Experience</h4>
                            <p class="text-white mb-0" style="text-align: justify; line-height: 1.8;">
                                Over 9 years of experience ensures practical and effective solutions.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="h-100 p-4 text-center rounded" style="background-color: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                            <div class="mb-3">
                                <i class="fas fa-users text-white" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-white mb-3">Client-Focused Approach</h4>
                            <p class="text-white mb-0" style="text-align: justify; line-height: 1.8;">
                                We optimize your existing resources and business processes to maximize ROI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Project Start -->
        @if($projects->isNotEmpty())
        <div class="container-fluid project mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Projects</h5>
                    <h1>{{$dashboard_composer->projects_title}}</h1>
                </div>
                <div class="row g-5">
                    @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{asset('images/main/'.$project->image)}}" width="310" height="310" class="img-fluid w-100 rounded" alt="{{$project->title}}">
                                <div class="project-content">
                                    <a  class="text-center">
                                        <h4 class="text-secondary">{{$project->title}}</h4>
                                        <p class="m-0 text-white">{{$project->subtitle}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            
           
                </div>
            </div>
        </div>
        @endif
        <!-- Project End -->


<!-- Our Clients Start -->
<div class="container-fluid py-5 mb-5 client-section">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s">
            <h1 class="text-primary">Our Clients</h1>
        </div>
        <div class="owl-carousel client-carousel wow fadeIn owl-loaded owl-drag" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
            @foreach($clients as $client)
                <div class="client-item grayscale-filter">
                    <img src="{{ asset('images/main/' . $client->image) }} " alt="{{$client->name}}" style="height: 150px;">
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Our Clients End -->






        <!-- Resource Start -->
<div class="container-fluid blog py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h5 class="text-primary">Resources</h5>
      <h1>{{ $dashboard_composer->resources_title }}</h1>
    </div>
    <div class="row g-5 justify-content-center">
      @foreach($resources as $resource)
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="resource shadow h-100" style="margin-bottom:0px;">
          <div class="post__img">
            <a href="{{ route('resourceDetails', ['slug' => $resource->slug]) }}">
              <img src="{{ asset('images/main/' . $resource->banner_image) }}" class="img-fluid" alt="{{$resource->title}}">
            </a>
          </div>
          <div class="post__content p-3 justify-content-between" style="margin:0px;">
      
              <div class="link-bar mb-2">
                <span class="date"><i class="fa fa-calendar text-secondary"></i> {{ \Carbon\Carbon::parse($resource->date)->format('d M Y') }}
</span>
                <span class="user text-primary" style="padding-left: 10px;">
                  <i class="fa fa-user"></i> <span itemprop="author"><a title="Posts by ITC" rel="author" style="color:#f79d18;">{{ $resource->name }}</a></span></span>
              </div>
              <h4 class="post__title" style="font-size: 20px;"><a href="{{ route('resourceDetails', ['slug' => $resource->slug]) }}">{{ $resource->title }}</a></h4>
               <a href="{{ route('resourceDetails', ['slug' => $resource->slug]) }}"style="color:gray;">
              <p class="post__desc" style="margin-bottom:0px;font-size:15px;text-align:justify;">{{ Str::limit($resource->short_description, 155) }}</p></a>
            </div>
        
         
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>       
 <!-- Resource End -->



        <!-- Testimonial Start -->
        @if($testimonials->isNotEmpty())
        <div class="container-fluid testimonial py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Testimonials</h5>
                    <h1>{{$dashboard_composer->testimonials_title}}</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="testimonial-quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="testimonial-content">
                            <p class="testimonial-text">{{$testimonial->words}}</p>
                        </div>
                        <div class="testimonial-rating">
                            @php
                                $rating = $testimonial->rating;
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5 ? true : false;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    <i class="fas fa-star"></i>
                                @elseif ($i == $fullStars + 1 && $halfStar)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="fas fa-star" style="opacity: 0.8;"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="testimonial-author">
                            <div class="testimonial-author-image">
                                <img src="{{ asset('images/main/' . $testimonial->image) }}" alt="{{$testimonial->name}}">
                            </div>
                            <div class="testimonial-author-info">
                                <h5 class="testimonial-author-name">{{$testimonial->name}}</h5>
                                <p class="testimonial-author-company">{{$testimonial->company}}</p>
                                <p class="testimonial-author-position">{{$testimonial->profession}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <style>
                .testimonial-card {
                    background: #ffffff;
                    border-radius: 20px;
                    padding: 40px 35px;
                    margin: 15px;
                    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    position: relative;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    border: 1px solid #f0f0f0;
                }
                
                .testimonial-card:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
                    border-color: #F69D17;
                }
                
                .testimonial-quote-icon {
                    position: absolute;
                    top: 25px;
                    right: 30px;
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #F69D17 0%, #ffb84d 100%);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #ffffff;
                    font-size: 24px;
                    opacity: 0.15;
                    transition: all 0.3s ease;
                }
                
                .testimonial-card:hover .testimonial-quote-icon {
                    opacity: 0.25;
                    transform: scale(1.1);
                }
                
                .testimonial-content {
                    margin-bottom: 25px;
                    flex-grow: 1;
                }
                
                .testimonial-text {
                    font-size: 1.05rem;
                    line-height: 1.8;
                    color: #4a5568;
                    font-style: italic;
                    margin: 0;
                    position: relative;
                    z-index: 1;
                }
                
                .testimonial-rating {
                    display: flex;
                    gap: 5px;
                    margin-bottom: 25px;
                    justify-content: center;
                }
                
                .testimonial-rating i {
                    font-size: 18px;
                    color: #F69D17;
                }
                
                .testimonial-author {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    padding-top: 20px;
                    border-top: 2px solid #f0f0f0;
                }
                
                .testimonial-author-image {
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    overflow: hidden;
                    border: 3px solid #F69D17;
                    flex-shrink: 0;
                    box-shadow: 0 5px 15px rgba(246, 157, 23, 0.2);
                }
                
                .testimonial-author-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
                
                .testimonial-author-info {
                    flex-grow: 1;
                }
                
                .testimonial-author-name {
                    font-size: 1.1rem;
                    font-weight: 700;
                    color: #08182e;
                    margin: 0 0 5px 0;
                }
                
                .testimonial-author-company {
                    font-size: 0.95rem;
                    color: #F69D17;
                    font-weight: 600;
                    margin: 0 0 3px 0;
                }
                
                .testimonial-author-position {
                    font-size: 0.85rem;
                    color: #718096;
                    margin: 0;
                }
                
                @media (max-width: 768px) {
                    .testimonial-card {
                        padding: 30px 25px;
                    }
                    
                    .testimonial-quote-icon {
                        width: 50px;
                        height: 50px;
                        font-size: 20px;
                        top: 20px;
                        right: 25px;
                    }
                    
                    .testimonial-text {
                        font-size: 0.95rem;
                    }
                }
                </style>
            </div>
        </div>
        @endif

        <!-- Testimonial End -->


        <!-- Contact Start -->
        <div class="container-fluid px-0">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Get In Touch</h5>
                    <h1 class="mb-3">{{$dashboard_composer->contact_us_title}}</h1>
                    <p class="mb-2">{{$dashboard_composer->contact_us_sub}}</p>
                </div>
                
                <div class="contact-detail" >
                    <div class="row g-5 mb-5 justify-content-center">
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="ms-3" style="max-width: calc(100% - 64px);">
                                    <h4 class="text-primary"style="word-wrap: break-word;">Address</h4>
                                    <a href="https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7"
                                     target="_blank" class="h5" style="word-wrap: break-word;">{{$dashboard_composer->address}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ms-3" style="max-width: calc(100% - 64px);">
                                    <h4 class="text-primary" style="word-wrap: break-word;">Call Us</h4>
                                    <a class="h5" href="tel:+977-{{$dashboard_composer->telephone}}" target="_blank" style="word-wrap: break-word;">{{$dashboard_composer->telephone}}, </a>
                                    <a class="h5" href="tel:+977{{$dashboard_composer->mobile}}" target="_blank" style="word-wrap: break-word;">{{$dashboard_composer->mobile}}</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                            <div class="d-flex bg-light p-3 rounded" >
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" >
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                  <div class="ms-3" style="max-width: calc(100% - 64px);">
                                    <h4 class="text-primary"style="word-wrap: break-word;">Email Us</h4>
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
<li>
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

          <section id="contact"> 
 <form class="contact-form rounded" method="POST" action="{{route('quoteSave')}}" id="contactForm2" >
            @csrf
                            <div class=" rounded contact-form" >
                            <div class="mb-4">
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name"
                      required>
                  </div>
                                <div class="mb-4">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email"
                      required>

                                                    </div>
                                <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Phone" id="Phone" name="phone"
                      required>
                                                   
                    </div>
                   
                    
                <div class="mb-4">
                  <select class="form-control custom-select-arrow" id="service" name="inquiry" required>
                    <option value="">Select Inquiry</option>
                    @foreach($services as $service)
                    <option value="{{ $service->title }}">{{ $service->title }}</option>
                    @endforeach
                  </select>
                </div>
                                 <div class=" mb-4">
                                <textarea class="form-control" placeholder="Message!" id="message" name="message"  style="height: 116px;"required></textarea>
                            </div>
                  <div class="col-12 mb-2">
              <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                  </div>
                </div>
                    <div class="text-start">
                                    
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


<script>
    function onSubmit(token) {
        document.getElementById("contactForm2").submit();
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://app.embed.im/snow.js" defer></script> -->

<script src="https://app.embed.im/spark.js" defer></script>
<script>
$(document).ready(function(){
    $('.client-item img').hover(function(){
        $(this).toggleClass('grayscale-filter');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var clientItems = document.querySelectorAll('.client-item img');
    clientItems.forEach(function(item) {
        item.addEventListener('mouseover', function() {
            item.classList.remove('grayscale-filter');
        });
        item.addEventListener('mouseout', function() {
            item.classList.add('grayscale-filter');
        });
    });
});
</script>
<style>
   
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px; 
        height: 50px; 
    }

    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
       
        font-size: 2rem; 
        color: #000; 
    }
</style>
@endsection