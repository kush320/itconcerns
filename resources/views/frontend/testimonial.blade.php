@extends('frontend.layouts.app')

@section('content')

        
        <!-- Page Header Start -->
        <div class="page-header">
  <div class="text-center py-6" style="background-image: url('images/main/{{ $dashboard_composer->testimonials_banner_image }}');">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Testimonial</h1>
    
  </div>
</div>
        <!-- Page Header End -->


        <!-- Testimonial Start -->
        <div class="container-fluid testimonial  my-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Testimonial</h5>
                    <h1>Our Client Saying!</h1>
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
                                $rating = isset($testimonial->rating) ? $testimonial->rating : 5;
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5 ? true : false;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    <i class="fas fa-star"></i>
                                @elseif ($i == $fullStars + 1 && $halfStar)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="fas fa-star" style="opacity: 0.3;"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="testimonial-author">
                            <div class="testimonial-author-image">
                                <img src="{{ asset('images/main/' . $testimonial->image) }}" alt="{{$testimonial->name}}">
                            </div>
                            <div class="testimonial-author-info">
                                <h5 class="testimonial-author-name">{{$testimonial->name}}</h5>
                                @if(isset($testimonial->company) && $testimonial->company)
                                <p class="testimonial-author-company">{{$testimonial->company}}</p>
                                @endif
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

        <!-- Testimonial End -->


     
@endsection