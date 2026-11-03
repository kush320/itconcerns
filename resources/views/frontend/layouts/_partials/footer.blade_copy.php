
        <!-- Footer Start -->
        <div class="container-fluid px-0 footer bg-primary wow fadeIn" data-wow-delay=".3s">
            <div class="container pt-5 pb-4">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                    <a class="h4 text-secondary">Share Your Concerns with Us.
                       </a>       
                            <div class="mt-4 text-light" style="text-align: justify;">{!!$dashboard_composer->description!!}
                            
                            </div>
                            <p>Engage with us on Social Media.</p>
                        <div class="d-flex hightech-link">
                            <a href="{{$dashboard_composer->facebook}}" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>
                            <a href="{{$dashboard_composer->twitter}}" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>
                            <a href="{{$dashboard_composer->instagram}}" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>
                            <a href="{{$dashboard_composer->linkedin}}" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <a href="{{route('serviceList')}}" class="h3 text-secondary">Services</a>
                        <div class="mt-4 d-flex flex-column short-link">
                        @foreach($services as $service)


<a href="{{route('serviceDetails', $service->slug)}}" class="mb-2 text-white">
    <i class="fas fa-angle-right text-secondary me-2">

    </i>{{$service->title}}</a>
    @endforeach
            </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="h3 text-secondary">Quick Links</a>
                        <div class="mt-4 d-flex flex-column short-link">
                            <a href="{{route('getPages', 'about-us')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>About Us</a>
                            <a href="{{route('getPages', 'contact-us')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Contact Us</a>
                            <a href="{{route('serviceList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Services</a>
                          <a href="{{route('productList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Products</a>
                          <a href="{{route('partnerList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Partners</a>
                            <a href="{{route('trainingList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Trainings</a>
                            <a href="{{route('resourceList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Latest Resources</a>
                            <a href="{{route('careerList')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Career</a>
                           <a href="{{route('downloads')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Downloads</a>
                       <a href="{{ route('sitemap') }}" class="mb-2 text-white">
                                <i class="fas fa-angle-right text-secondary me-2"></i>Sitemap
                            </a>
                          <a href="{{ route('tools') }}" class="mb-2 text-white">
                                <i class="fas fa-angle-right text-secondary me-2"></i>Tools
                            </a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="h3 text-secondary">Contact Us</a>
                        <div class="text-white mt-4 d-flex flex-column contact-link">
                            <a href="https://maps.app.goo.gl/Z9Z3NuFtBTWzd1PU7" class="pb-3 text-light border-bottom border-secondary">
                                <i class="fas fa-map-marker-alt text-secondary me-2"></i>{{$dashboard_composer->address}}</a>
                            <a href="tel:+977-01-4571161" class="py-3 text-light border-bottom border-secondary">
                              <i class="fa-solid fa-tty text-secondary me-2"></i> 
                                 {{$dashboard_composer->telephone}}, {{$dashboard_composer->mobile}}
                            </a>
                            <a href="mailto:{{$dashboard_composer->email}}" class="py-3 text-light border-bottom border-secondary"><i class="fas fa-envelope text-secondary me-2"></i> {{$dashboard_composer->email}}</a>
                        </div>
                      <div class="mt-4">
                     <a target="_blank" rel="nofollow" href="https://client.partners/verify/itconcerns.com.np"><img width="200" alt="Client Partners Verified" src="https://s3.us-east-2.amazonaws.com/s3.client.partners/client-partners-verified.png"></a>
                      </div>
                      </div>
                  
                </div>
                <hr class="text-light mt-5 mb-4">
                <div class="row">
                    <div class="col-md-12 text-center">
               <!--         <span class="text-light"><a href="{{'/'}}" class="text-secondary"><i class="fas fa-copyright text-secondary me-2">&nbsp;2024</i>{{$dashboard_composer->site_name}}</a>&nbsp;All Rights Reserved.</span>
                   -->
                  
                  
                  <span class="text-light">
    <a href="{{ '/' }}" class="text-secondary">
        <i class="fas fa-copyright text-secondary me-2">&nbsp;<?php echo date('Y'); ?></i>
        {{$dashboard_composer->site_name}}
    </a>&nbsp;All Rights Reserved.
</span>
                  
                  
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


      

 <script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siqecf3dd9e9c6220c0d451673be45d7d08ce07b2461e9d76a21c1b2887b5ea141d59f53eee7c1139719e30057c000a7268" defer></script> 
           
    </body>

</html>