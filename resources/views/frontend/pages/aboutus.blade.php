@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_about_title)
@section('meta_description', $dashboard_composer->meta_about_description)
@section('canonical_url', $dashboard_composer->canonical_url_about)
@section('content')

<div class="page-header">
  <div class="text-center py-6" style="background-image: url('{{ asset('images/main/' . $dashboard_composer->aboutus_banner_image) }}'); background-size: cover; background-position: center;"alt="{{$dashboard_composer->aboutus_banner_image}}">
    <h1 class="display-2 text-white mb-4 animated slideInDown">About Us</h1>
  </div>
</div>



        <!-- Page Header End -->



        <!-- About Start -->
        <div class="container-fluid py-5 my-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="{{ asset('images/main/' . $dashboard_composer->about_us_image1) }}" class="img-fluid w-75 rounded" alt="{{$dashboard_composer->about_us_image1}}" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="{{ asset('images/main/' . $dashboard_composer->about_us_image2) }}" class="img-fluid w-100 rounded" alt="{{$dashboard_composer->about_us_image2}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h1 >{{$dashboard_composer->about_us_title}}</h1>
                        <!--<p class="mb-4"style="text-align: justify;">{{$dashboard_composer->about_us_sub}}</p>-->
                        <p class="mb-4" style="text-align: justify;">{!! $dashboard_composer->about_us_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

       
 <!-- Team Start -->
        @if($leaders->isNotEmpty())
<div class="container-fluid my-5 team">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1>Our Leaders</h1>
        </div>
        <div class="row justify-content-center wow fadeIn" data-wow-delay=".5s">
            @foreach($leaders as $leader)
            <div class="col-md-4 mb-4">
                <div class="leader-card shadow-lg h-100" style="background: #fff; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; border-top: 4px solid #F69D17;">
                    <div class="leader-content" style="padding: 30px; text-align: center;">
                        <div class="leader-img-wrapper mb-4" style="position: relative;">
                            <div class="leader-img" style="width: 180px; height: 180px; margin: 0 auto; border-radius: 50%; overflow: hidden; border: 5px solid #F69D17; box-shadow: 0 10px 30px rgba(246, 157, 23, 0.3);">
                                <img src="{{ asset('images/main/' . $leader->image) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{$leader->name}}">
                            </div>
                            </div>
                        <div class="leader-info">
                            <h4 class="mb-2" style="color: #08182e; font-weight: 700; font-size: 1.5rem;">{{ $leader->name }}</h4>
                            <p class="mb-3" style="color: #F69D17; font-weight: 600; font-size: 1rem; text-transform: uppercase; letter-spacing: 1px;">{{ $leader->post }}</p>
                            @if($leader->description)
                            <p class="mb-4" style="color: #666; line-height: 1.8; font-size: 0.95rem; text-align: justify; min-height: 80px;">{!! strip_tags($leader->description) !!}</p>
                            @endif
                            <div class="leader-social d-flex justify-content-center gap-2" style="padding-top: 20px; border-top: 1px solid #e9ecef;">
                                @if($leader->facebook)
                                <a class="btn btn-square text-white rounded-circle" href="{{ $leader->facebook }}" target="_blank" style="background: #1877F2; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(24, 119, 242, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                @endif
                                @if($leader->twitter)
                                <a class="btn btn-square text-white rounded-circle" href="{{ $leader->twitter }}" target="_blank" style="background: #1DA1F2; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(29, 161, 242, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                @if($leader->instagram)
                                <a class="btn btn-square text-white rounded-circle" href="{{ $leader->instagram }}" target="_blank" style="background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(225, 48, 108, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                @endif
                                @if($leader->linkedin)
                                <a class="btn btn-square text-white rounded-circle" href="{{ $leader->linkedin }}" target="_blank" style="background: #0077B5; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0, 119, 181, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>
</div>
 @endif


<div class="container-fluid  my-5 team">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Teams</h5>
            <h1>Our Experts Team</h1>
        </div>
    
        <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
          
            @foreach($teams as $team)
            <!-- <div class="team-item"> -->
                <div class="team-card-wrapper">
                    <div class="team-card h-100">
                        <div class="team-card-inner">
                            <div class="team-image-container">
                                <div class="team-image-wrapper">
                                    <img src="{{ asset('images/main/' . $team->image) }}" class="team-image" alt="{{$team->name}}">
                                </div>
                            </div>
                            <div class="team-content-wrapper">
                                <div class="team-info">
                                    <h4 class="team-name">{{ $team->name }}</h4>
                                    <p class="team-position">{{ $team->post }}</p>
                                </div>
                                <div class="team-social-links">
                                    @if($team->facebook)
                                    <a class="team-social-btn facebook" href="{{ $team->facebook }}" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    @endif
                                    @if($team->twitter)
                                    <a class="team-social-btn twitter" href="{{ $team->twitter }}" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    @endif
                                    @if($team->instagram)
                                    <a class="team-social-btn instagram" href="{{ $team->instagram }}" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    @endif
                                    @if($team->linkedin)
                                    <a class="team-social-btn linkedin" href="{{ $team->linkedin }}" target="_blank" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            @endforeach
        </div>
        
        <style>
        .team-card-wrapper {
            padding: 15px;
        }
        
        .team-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
            border: 1px solid #f0f0f0;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
            border-color: #F69D17;
        }
        
        .team-card-inner {
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .team-image-container {
            position: relative;
            padding: 40px 30px 30px;
            background: #ffffff;
            text-align: center;
        }
        
        .team-image-wrapper {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #f8f9fa;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            background: #ffffff;
        }
        
        .team-card:hover .team-image-wrapper {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(246, 157, 23, 0.25);
            border-color: #F69D17;
        }
        
        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            display: block;
        }
        
        .team-card:hover .team-image {
            transform: scale(1.08);
        }
        
        .team-content-wrapper {
            padding: 0 30px 30px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .team-info {
            margin-bottom: 25px;
        }
        
        .team-name {
            font-size: 1.35rem;
            font-weight: 700;
            color: #08182e;
            margin-bottom: 10px;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }
        
        .team-position {
            font-size: 0.9rem;
            color: #F69D17;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }
        
        .team-social-links {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
            margin-top: auto;
        }
        
        .team-social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .team-social-btn.facebook {
            background: #1877F2;
        }
        
        .team-social-btn.twitter {
            background: #1DA1F2;
        }
        
        .team-social-btn.instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }
        
        .team-social-btn.linkedin {
            background: #0077B5;
        }
        
        .team-social-btn:hover {
            transform: translateY(-4px) scale(1.1);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
        }
        
        .team-social-btn:active {
            transform: translateY(-2px) scale(1.05);
        }
        
        @media (max-width: 768px) {
            .team-image-wrapper {
                width: 160px;
                height: 160px;
            }
            
            .team-name {
                font-size: 1.2rem;
            }
            
            .team-image-container {
                padding: 35px 25px 25px;
            }
            
            .team-content-wrapper {
                padding: 0 25px 25px;
            }
        }
        </style>
        <!-- End of Carousel Markup -->
    </div>
</div>

   @endsection
