<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="{{asset('/assets/frontend/images/itconcerns.png')}}" type="image/gif">
    <title>@yield('meta_title')</title>
  <meta name="description" content="@yield('meta_description')" />
  <meta name="keywords" content="@yield('keywords')">
  <meta name="keyphrase" content="@yield('meta_keyphrase')" />

  @yield('meta')
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/assets/frontend/lib/animate/animate.min.css" rel="stylesheet">
        <link href="/assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/assets/frontend/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/assets/frontend/css/style.css" rel="stylesheet">
      
      <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-light py-2 d-none d-md-flex">
            <div class="container">
                <div class="d-flex justify-content-between topbar">
                    <div class="top-info">
                        <small  style="#787878 !important">
                          <a href="https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7" style="color: #08182e;">
                            <i class="fas fa-map-marker-alt me-0 text-secondary">
                            </i>
                            {{$dashboard_composer->address}}  
                        </a>
                          </small>
                          &nbsp;
                        <small  style="#787878 !important">
                        <a href="mailto:{{$dashboard_composer->email}}" style="color: #08182e;"><i class="fas fa-envelope me-1 text-secondary"></i>{{$dashboard_composer->email}}
                    </a> </small>
                    </div>
                    <div id="note" class="text-primary d-none d-xl-flex"><small style="font-size:16px">{{$dashboard_composer->notes}}</small></div>
                    <div class="top-link">
                        <a href="{{$dashboard_composer->facebook}}" class="btn-secondary nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-light"></i></a>
                        <a href="{{$dashboard_composer->twitter}}" class="btn-secondary nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-light"></i></a>
                        <a href="{{$dashboard_composer->instagram}}" class="btn-secondary nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-light"></i></a>
                        <a href="{{$dashboard_composer->linkedin}}" class="btn-secondary nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-light"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
           <div class="nav-wrapper">
        <div class="container-fluid bg-primary py-2">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="{{'/'}}" class="navbar-brand">
                    <img src="{{asset(!is_null($dashboard_composer->logo) ? 'images/main/' . $dashboard_composer->logo : '/assets/frontend/images/logo.png')}}"
            alt="logo" class="logo-light" alt="logo" style="width:220px;height:33px;">                    
            </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                        <div class="navbar-nav ms-auto mx-xl-auto p-0">
                            <a href="{{'/'}}" class="nav-item nav-link {{ request()->is('/') ? 'active text-secondary' : '' }}">Home</a>
                            <div class="nav-item dropdown">
                                <a   class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Company</a>
                                <div class="dropdown-menu rounded">
                                   <a href="{{route('getPages','about-us')}}" class="dropdown-item">About Us</a>
                                    <!--<a href="{{route('testimonials')}}" class="dropdown-item">Testimonial</a>-->
                                   <a href="{{ route('partnerList') }}" class="dropdown-item">Partners</a>
                                 
                                </div>
                            </div>
                            <a href="{{route('serviceList')}}" class="nav-item nav-link {{ request()->is('service') ? 'active text-secondary' : '' }}">Services</a>
                          <a href="{{ route('productList') }}" class="nav-item nav-link {{ request()->is('product') ? 'active text-secondary' : '' }}">Products</a>  
                          <div class="nav-item dropdown">
                                <a  class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Resources</a>
                                <div class="dropdown-menu rounded">
                                    <a href="{{route('resourceList')}}" class="dropdown-item">Blog</a>
                                   <a href="{{ route('trainingList') }}" class="dropdown-item">Trainings</a>
                                   <a href="{{ route('downloads') }}" class="dropdown-item">Downloads</a>
                                  <a href="{{ route('tools') }}" class="dropdown-item">Tools</a>
                                </div>
                            </div>
                            <a href="{{ route('careerList') }}" class="nav-item nav-link {{ request()->is('career') ? 'active text-secondary' : '' }}">Career</a>
                            <a href="{{route('getPages','contact-us')}}" class="nav-item nav-link {{ request()->is('contact-us') ? 'active text-secondary' : '' }}">Contact</a>
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-shirink-0">
                        <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4" style="font-size: 13px;">
                            <a href="tel:+977{{$dashboard_composer->telephone}}" class="position-relative animated tada infinite">
                                <i class="fa fa-phone-alt text-white fa-2x" ></i>
                                <div class="position-absolute" style="top: -7px; left: 20px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column ">
                            <span class="text-white-50">Have any questions?</span>
                            <span class="text-secondary">Call: {{$dashboard_composer->telephone}}</span>
                        </div>
                    
                    </div>
                </nav>
            </div>
        </div>
        </div>
        <!-- Navbar End -->
