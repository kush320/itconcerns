@extends('frontend.layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('images/main/{{ $dashboard_composer->teams_banner_image }}');">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Our Teams</h1>
 
  </div>
</div>
<!-- Page Header End -->

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
            <div class="team-item">
                <div class="team-card-wrapper">
                    <div class="team-card h-100">
                        <div class="team-card-inner">
                            <div class="team-image-container">
                                <div class="team-image-wrapper">
                                    <img src="{{ asset('images/main/' . $team->image) }}" class="team-image" alt="{{$team->name}}">
                                    <div class="team-overlay"></div>
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
            </div>
            @endforeach
        </div>
        
        <style>
        .team-card-wrapper {
            padding: 15px;
        }
        
        .team-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .team-card-inner {
            position: relative;
        }
        
        .team-image-container {
            position: relative;
            padding: 30px 30px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .team-image-wrapper {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 6px solid #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }
        
        .team-card:hover .team-image-wrapper {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(246, 157, 23, 0.3);
            border-color: #F69D17;
        }
        
        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        
        .team-card:hover .team-image {
            transform: scale(1.1);
        }
        
        .team-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(246, 157, 23, 0.1) 0%, rgba(8, 24, 46, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .team-card:hover .team-overlay {
            opacity: 1;
        }
        
        .team-content-wrapper {
            padding: 25px 30px 30px;
            text-align: center;
        }
        
        .team-info {
            margin-bottom: 20px;
        }
        
        .team-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #08182e;
            margin-bottom: 8px;
            line-height: 1.3;
        }
        
        .team-position {
            font-size: 0.95rem;
            color: #F69D17;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }
        
        .team-social-links {
            display: flex;
            justify-content: center;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        
        .team-social-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
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
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        
        .team-social-btn:active {
            transform: translateY(-2px) scale(1.05);
        }
        
        @media (max-width: 768px) {
            .team-image-wrapper {
                width: 180px;
                height: 180px;
            }
            
            .team-name {
                font-size: 1.2rem;
            }
        }
        </style>
        <!-- End of Carousel Markup -->
    </div>
</div>

@endsection
