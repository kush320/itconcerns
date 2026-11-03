
        <!-- Footer Start -->
        <style>
            .footer-modern {
                position: relative;
            }
            .footer-modern .footer-content {
                position: relative;
            }
            .footer-modern .footer-heading {
                color: #f79d18;
                font-weight: 700;
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
                position: relative;
                padding-bottom: 0.75rem;
            }
            .footer-modern .footer-heading::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 50px;
                height: 3px;
                background: linear-gradient(90deg, #f79d18, transparent);
                border-radius: 2px;
            }
            .footer-modern .footer-link {
                color: rgba(255, 255, 255, 0.85);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                padding: 0.5rem 0;
                transition: all 0.3s ease;
                position: relative;
            }
            .footer-modern .footer-link:hover {
                color: #f79d18;
                transform: translateX(5px);
                padding-left: 5px;
            }
            .footer-modern .footer-link i {
                margin-right: 0.75rem;
                font-size: 0.875rem;
                transition: all 0.3s ease;
            }
            .footer-modern .footer-link:hover i {
                color: #f79d18;
            }
            .footer-modern .social-icon {
                width: 45px;
                height: 45px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                color: #fff;
                transition: all 0.3s ease;
                margin-right: 0.75rem;
                margin-bottom: 0.75rem;
            }
            .footer-modern .social-icon:hover {
                background: #f79d18;
                border-color: #f79d18;
                color: #fff;
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(247, 157, 24, 0.4);
            }
            .footer-modern .office-card {
                background: rgba(255, 255, 255, 0.08);
                border-left: 4px solid #f79d18;
                border-radius: 8px;
                padding: 1.25rem;
                margin-bottom: 1rem;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            .footer-modern .office-card:hover {
                background: rgba(255, 255, 255, 0.12);
                transform: translateX(5px);
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            }
            .footer-modern .office-card h6 {
                color: #f79d18;
                font-weight: 600;
                margin-bottom: 1rem;
                font-size: 1rem;
            }
            .footer-modern .office-card a {
                color: rgba(255, 255, 255, 0.85);
                text-decoration: none;
                display: block;
                margin-bottom: 0.75rem;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            }
            .footer-modern .office-card a:hover {
                color: #f79d18;
                padding-left: 5px;
            }
            .footer-modern .office-card a i {
                color: #f79d18;
                margin-right: 0.5rem;
                width: 18px;
            }
            .footer-modern .description-text {
                color: rgba(255, 255, 255, 0.9);
                line-height: 1.8;
                font-size: 0.95rem;
            }
            .footer-modern .copyright-section {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 2rem;
                margin-top: 3rem;
            }
            .footer-modern .copyright-text {
                color: rgba(255, 255, 255, 0.7);
                font-size: 0.9rem;
            }
            .footer-modern .copyright-text a {
                color: #f79d18;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            .footer-modern .copyright-text a:hover {
                color: #fff;
            }
        </style>
        <div class="container-fluid px-0 footer bg-primary footer-modern wow fadeIn" data-wow-delay=".3s">
            <div class="container pt-5 pb-4 footer-content">
                <div class="row g-5">
                    <!-- About Section -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h3 class="footer-heading">Share Your Concerns with Us</h3>
                        <div class="description-text mt-4" style="text-align: justify;">
                            {!!$dashboard_composer->description!!}
                        </div>
                        <p class="mt-4 mb-3" style="color: rgba(255, 255, 255, 0.9); font-weight: 500;">Engage with us on Social Media</p>
                        <div class="d-flex flex-wrap">
                            <a href="{{$dashboard_composer->facebook}}" target="_blank" class="social-icon" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{$dashboard_composer->twitter}}" target="_blank" class="social-icon" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{{$dashboard_composer->instagram}}" target="_blank" class="social-icon" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="{{$dashboard_composer->linkedin}}" target="_blank" class="social-icon" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Services Section -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h3 class="footer-heading">
                            <a href="{{route('serviceList')}}" style="color: inherit; text-decoration: none;">Services</a>
                        </h3>
                        <div class="mt-4 d-flex flex-column">
                            @foreach($services as $service)
                                <a href="{{route('serviceDetails', $service->slug)}}" class="footer-link">
                                    <i class="fas fa-angle-right"></i>
                                    <span>{{$service->title}}</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-4 d-flex align-items-center">
                            <a target="_blank" rel="nofollow" href="https://client.partners/verify/itconcerns.com.au" style="opacity: 0.9; transition: opacity 0.3s;">
                                <img width="200" alt="Client Partners Verified" src="https://s3.us-east-2.amazonaws.com/s3.client.partners/client-partners-verified.png" style="max-height: 60px; filter: brightness(1.1);" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Links Section -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h3 class="footer-heading">Quick Links</h3>
                        <div class="mt-4 d-flex flex-column">
                            <a href="{{route('getPages', 'about-us')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>About Us</span>
                            </a>
                            <a href="{{route('getPages', 'contact-us')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Contact Us</span>
                            </a>
                            <a href="{{route('serviceList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Services</span>
                            </a>
                            <a href="{{route('productList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Products</span>
                            </a>
                            <a href="{{route('partnerList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Partners</span>
                            </a>
                            <a href="{{route('trainingList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Trainings</span>
                            </a>
                            <a href="{{route('resourceList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Latest Resources</span>
                            </a>
                            <a href="{{route('careerList')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Career</span>
                            </a>
                            <a href="{{route('downloads')}}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Downloads</span>
                            </a>
                            <a href="{{ route('sitemap') }}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Sitemap</span>
                            </a>
                            <a href="{{ route('tools') }}" class="footer-link">
                                <i class="fas fa-angle-right"></i>
                                <span>Tools</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contact Us Section -->
                    <div class="col-lg-3 col-md-6">
                        <h3 class="footer-heading">Contact Us</h3>
                        <div class="mt-4">
                            <!-- Office 1 -->
                            <div class="office-card">
                                @if(isset($dashboard_composer->office1_name) && $dashboard_composer->office1_name)
                                    <h6>
                                        <i class="fas fa-building"></i> {{ $dashboard_composer->office1_name }}
                                    </h6>
                                @endif
                                <div>
                                    @if(isset($dashboard_composer->office1_address) && $dashboard_composer->office1_address)
                                        <a href="{{ isset($dashboard_composer->office1_map_url) && $dashboard_composer->office1_map_url ? $dashboard_composer->office1_map_url : 'https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7' }}" target="_blank">
                                            <i class="fas fa-map-marker-alt"></i>{{ $dashboard_composer->office1_address }}
                                        </a>
                                    @elseif($dashboard_composer->address)
                                        <a href="{{ $dashboard_composer->googlemap ?? 'https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7' }}" target="_blank">
                                            <i class="fas fa-map-marker-alt"></i>{{ $dashboard_composer->address }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office1_phone) && $dashboard_composer->office1_phone)
                                        <a href="tel:{{ $dashboard_composer->office1_phone }}">
                                            <i class="fa-solid fa-phone"></i>{{ $dashboard_composer->office1_phone }}
                                        </a>
                                    @elseif($dashboard_composer->telephone)
                                        <a href="tel:{{ $dashboard_composer->telephone }}">
                                            <i class="fa-solid fa-phone"></i>{{ $dashboard_composer->telephone }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office1_email) && $dashboard_composer->office1_email)
                                        <a href="mailto:{{ $dashboard_composer->office1_email }}">
                                            <i class="fas fa-envelope"></i>{{ $dashboard_composer->office1_email }}
                                        </a>
                                    @elseif($dashboard_composer->email)
                                        <a href="mailto:{{ $dashboard_composer->email }}">
                                            <i class="fas fa-envelope"></i>{{ $dashboard_composer->email }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Office 2 -->
                            @if(isset($dashboard_composer->office2_address) && $dashboard_composer->office2_address)
                            <div class="office-card">
                                @if(isset($dashboard_composer->office2_name) && $dashboard_composer->office2_name)
                                    <h6>
                                        <i class="fas fa-building"></i> {{ $dashboard_composer->office2_name }}
                                    </h6>
                                @endif
                                <div>
                                    @if($dashboard_composer->office2_address)
                                        <a href="{{ isset($dashboard_composer->office2_map_url) && $dashboard_composer->office2_map_url ? $dashboard_composer->office2_map_url : 'https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7' }}" target="_blank">
                                            <i class="fas fa-map-marker-alt"></i>{{ $dashboard_composer->office2_address }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office2_phone) && $dashboard_composer->office2_phone)
                                        <a href="tel:{{ $dashboard_composer->office2_phone }}">
                                            <i class="fa-solid fa-phone"></i>{{ $dashboard_composer->office2_phone }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office2_email) && $dashboard_composer->office2_email)
                                        <a href="mailto:{{ $dashboard_composer->office2_email }}">
                                            <i class="fas fa-envelope"></i>{{ $dashboard_composer->office2_email }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <!-- Office 3 -->
                            @if(isset($dashboard_composer->office3_address) && $dashboard_composer->office3_address)
                            <div class="office-card">
                                @if(isset($dashboard_composer->office3_name) && $dashboard_composer->office3_name)
                                    <h6>
                                        <i class="fas fa-building"></i> {{ $dashboard_composer->office3_name }}
                                    </h6>
                                @endif
                                <div>
                                    @if($dashboard_composer->office3_address)
                                        <a href="{{ isset($dashboard_composer->office3_map_url) && $dashboard_composer->office3_map_url ? $dashboard_composer->office3_map_url : 'https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7' }}" target="_blank">
                                            <i class="fas fa-map-marker-alt"></i>{{ $dashboard_composer->office3_address }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office3_phone) && $dashboard_composer->office3_phone)
                                        <a href="tel:{{ $dashboard_composer->office3_phone }}">
                                            <i class="fa-solid fa-phone"></i>{{ $dashboard_composer->office3_phone }}
                                        </a>
                                    @endif
                                    @if(isset($dashboard_composer->office3_email) && $dashboard_composer->office3_email)
                                        <a href="mailto:{{ $dashboard_composer->office3_email }}">
                                            <i class="fas fa-envelope"></i>{{ $dashboard_composer->office3_email }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Copyright Section -->
                <div class="copyright-section">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="copyright-text mb-0">
                                © {{ date('Y') }}
                                <a href="{{ url('/') }}">Information Technology Concerns Pvt. Ltd.</a>
                                All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>

        <script src="/assets/frontend/lib/wow/wow.min.js" ></script>
        <script src="/assets/frontend/lib/easing/easing.min.js" ></script>
        <script src="/assets/frontend/lib/waypoints/waypoints.min.js" ></script>
        <script src="/assets/frontend/lib/owlcarousel/owl.carousel.min.js" ></script>

        <!-- Template Javascript -->
      <!--<script src="/assets/frontend/js/jquery-3.5.1.min.js"></script>-->
      <script src="/assets/frontend/js/plugins.js" ></script>
        <script src="/assets/frontend/js/main.js" ></script>


      

        <!-- WhatsApp Floating Button -->
        <style>
            .whatsapp-float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 20px;
                right: 20px;
                background-color: #25d366;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                text-decoration: none;
            }
            .whatsapp-float:hover {
                background-color: #20ba5a;
                transform: scale(1.1);
                box-shadow: 3px 3px 5px #666;
            }
            .whatsapp-float i {
                margin-top: 0;
            }
            .back-to-top {
                position: fixed !important;
                width: 50px !important;
                height: 50px !important;
                bottom: 20px !important;
                left: 20px !important;
                z-index: 1000 !important;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .back-to-top i {
                font-size: 20px;
            }
        </style>
        <a href="https://wa.me/+9779818953090" 
           class="whatsapp-float" 
           target="_blank" 
           title="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
           
    </body>

</html>