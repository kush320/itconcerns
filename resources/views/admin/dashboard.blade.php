@extends('admin.layouts.app')

@section('page_title')
Dashboard
@endsection

@section('content')

<div class="page-content fade-in-up">
    @include('admin.layouts._partials.messages.info')
    
    <form method="post" action="{{route('dashboard.save', $detail->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SEO Details</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">

                        <div class="form-group">
                            <label>Page Title</label>
                            <input class="form-control" type="text" name="page_title" value="{{$detail->page_title}}"
                                placeholder="Enter Page Title">
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input class="form-control" type="text" name="meta_title" value="{{$detail->meta_title}}"
                                placeholder="Enter Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_description}}"
                                name="meta_description" placeholder="Enter Meta Description">
                        </div>
                        <div class="form-group">
                            <label>Meta Keyphrase</label>
                            <input class="form-control" type="text" value="{{$detail->meta_keyphrase}}"
                                name="meta_keyphrase" placeholder="Enter Meta Keyphrase">
                        </div>

                        <div class="form-group">
                            <label>Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url}}"
                                name="canonical_url" placeholder="Enter Canonical Url">
                        </div>
                        <div class="form-group">
                            <label>Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword"
                                placeholder="Enter Keywords">
                        </div>
                      
                      <div class="form-group">
                            <label>About Meta Title</label>
                            <input class="form-control" type="text" name="meta_about_title" value="{{$detail->meta_about_title}}"
                                placeholder="Enter About Meta Title">
                        </div>

                        <div class="form-group">
                            <label>About Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_about_description}}"
                                name="meta_about_description" placeholder="Enter About Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>About Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_about}}"
                                name="canonical_url_about" placeholder="Enter About Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>About Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->about_keyword}}" name="about_keyword"
                                placeholder="Enter About Keywords">
                        </div>
                        <div class="form-group">
                            <label>Contact Meta Title</label>
                            <input class="form-control" type="text" name="meta_contact_title" value="{{$detail->meta_contact_title}}"
                                placeholder="Enter Contact Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Contact Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_contact_description}}"
                                name="meta_contact_description" placeholder="Enter Contact Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Contact Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_contact}}"
                                name="canonical_url_contact" placeholder="Enter Contact Canonical Url">
                        </div>
                      
                       <div class="form-group">
                            <label>Contact Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->contact_keyword}}" name="contact_keyword"
                                placeholder="Enter Contact Keywords">
                        </div>
                      
                        <div class="form-group">
                            <label>Service Meta Title</label>
                            <input class="form-control" type="text" name="meta_service_title" value="{{$detail->meta_service_title}}"
                                placeholder="Enter Service Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Service Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_service_description}}"
                                name="meta_service_description" placeholder="Enter Service Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Service Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_service}}"
                                name="canonical_url_service" placeholder="Enter Service Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>Service Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->service_keyword}}" name="service_keyword"
                                placeholder="Enter Service Keywords">
                        </div>
                      
                       <div class="form-group">
                            <label>Resource Meta Title</label>
                            <input class="form-control" type="text" name="meta_resource_title" value="{{$detail->meta_resource_title}}"
                                placeholder="Enter Resource Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Resource Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_resource_description}}"
                                name="meta_service_description" placeholder="Enter Resource Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Resource Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_resource}}"
                                name="canonical_url_resource" placeholder="Enter Resource Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>Resource Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->resource_keyword}}" name="resource_keyword"
                                placeholder="Enter Resource Keywords">
                        </div>
                      
                       <div class="form-group">
                            <label>Download Meta Title</label>
                            <input class="form-control" type="text" name="meta_download_title" value="{{$detail->meta_download_title}}"
                                placeholder="Enter Download Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Download Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_download_description}}"
                                name="meta_download_description" placeholder="Enter Download Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Download Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_download}}"
                                name="canonical_url_download" placeholder="Enter Download Canonical Url">
                        </div>
                      
                       <div class="form-group">
                            <label>Download Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->download_keyword}}" name="download_keyword"
                                placeholder="Enter Download Keywords">
                        </div>
                      
                        <div class="form-group">
                            <label>Career Meta Title</label>
                            <input class="form-control" type="text" name="meta_career_title" value="{{$detail->meta_career_title}}"
                                placeholder="Enter Career Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Career Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_career_description}}"
                                name="meta_career_description" placeholder="Enter Career Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Career Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_career}}"
                                name="canonical_url_career" placeholder="Enter Career Canonical Url">
                        </div>
                      
                       <div class="form-group">
                            <label>Career Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->career_keyword}}" name="career_keyword"
                                placeholder="Enter Career Keywords">
                        </div>
                      
                        <div class="form-group">
                            <label>Product Meta Title</label>
                            <input class="form-control" type="text" name="meta_product_title" value="{{$detail->meta_product_title}}"
                                placeholder="Enter Product Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Product Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_product_description}}"
                                name="meta_product_description" placeholder="Enter Product Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Product Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_product}}"
                                name="canonical_url_product" placeholder="Enter Product Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>Product Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->product_keyword}}" name="product_keyword"
                                placeholder="Enter Product Keywords">
                        </div>
                       <div class="form-group">
                            <label>Training Meta Title</label>
                            <input class="form-control" type="text" name="meta_training_title" value="{{$detail->meta_training_title}}"
                                placeholder="Enter Training Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Training Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_training_description}}"
                                name="meta_training_description" placeholder="Enter Training Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Training Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_training}}"
                                name="canonical_url_training" placeholder="Enter Triaing Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>Training Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->training_keyword}}" name="training_keyword"
                                placeholder="Enter Training Keywords">
                        </div>
                      
                      <div class="form-group">
                            <label>Partners Meta Title</label>
                            <input class="form-control" type="text" name="meta_partners_title" value="{{$detail->meta_partners_title}}"
                                placeholder="Enter Partners Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Partners Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_partners_description}}"
                                name="meta_partners_description" placeholder="Enter Partners Meta Description">
                        </div>
                    

                        <div class="form-group">
                            <label>Partners Canonical Url</label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url_partners}}"
                                name="canonical_url_partners" placeholder="Enter Partners Canonical Url">
                        </div>
                       <div class="form-group">
                            <label>Partners Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->partner_keyword}}" name="partner_keyword"
                                placeholder="Enter Partners Keywords">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Social Media Links</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" value="{{$detail->facebook}}" name="facebook"
                                    placeholder="Ente Facebook Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Instagram Link</label>
                                <input class="form-control" type="text" value="{{$detail->instagram}}" name="instagram"
                                    placeholder="Enter Instagram Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Twitter Link</label>
                                <input class="form-control" type="text" value="{{$detail->twitter}}" name="twitter"
                                    placeholder="Enter Twitter Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" value="{{$detail->linkedin}}" name="linkedin"
                                    placeholder="Enter Linkedin Link">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Homepage Setups</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                        </div>
                    </div>

                                    <div class="ibox-body" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label> Services_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->services_title}}"
                                                    name="services_title"
                                                    placeholder="Enter  Services Title">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Projects_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->projects_title}}"
                                                    name="projects_title"
                                                    placeholder="Enter  Projects Title">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Resources_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->resources_title}}"
                                                    name="resources_title"
                                                    placeholder="Enter  Resource Title">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Teams_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->teams_title}}"
                                                    name="teams_title"
                                                    placeholder="Enter  Teams Title">
                                            </div>
                                            
                                            <div class="col-md-6 form-group">
                                                <label> Testimonials_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->testimonials_title}}"
                                                    name="testimonials_title"
                                                    placeholder="Enter  Testimonial Title">
                                            </div>
                                        </div>
                                    </div>
                         
                        
                    <div class="ibox-body" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">About Us Setups</div>
                                        <div class="ibox-tools">
                                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                                        </div>
                                    </div>
                                    <div class="ibox-body" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label> About-us_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->about_us_title}}"
                                                    name="about_us_title"
                                                    placeholder="Enter About-us Title">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>About-Us_sub</label>
                                                <textarea name="about_us_sub" placeholder="Enter Sub Description"
                                                    class="form-control" rows="3"
                                                    cols="80">{{$detail->about_us_sub}}</textarea>

                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>About-Us_Description</label>
                                                <textarea name="about_us_description" placeholder="Enter Description"
                                                    class="form-control" rows="3"
                                                    cols="80">{{$detail->about_us_description}}</textarea>

                                            </div>                                         
                                            <div class="col-sm-6 form-group">
                                                <label>About Us Image1</label>
                                                <input type="file" id="fileUpload1" name="about_us_image1"
                                                    value="{{$detail->about_us_image1}}" class="form-control">
                                                <div id="wrapper" class="mt-2">
                                                    <div id="image-holder1">
                                                        @if($detail->about_us_image1)
                                                        <img src="{{asset('images/main/' . $detail->about_us_image1)}}"
                                                            alt="" class="thumb-image" height="120px" width="120px">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>About Us Image2</label>
                                                <input type="file" id="fileUpload1" name="about_us_image2"
                                                    value="{{$detail->about_us_image2}}" class="form-control">
                                                <div id="wrapper" class="mt-2">
                                                    <div id="image-holder1">
                                                        @if($detail->about_us_image2)
                                                        <img src="{{asset('images/main/' . $detail->about_us_image2)}}"
                                                            alt="" class="thumb-image" height="120px" width="120px">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">Contact Us PAge Setups</div>
                                        <div class="ibox-tools">
                                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                                        </div>
                                    </div>
                                    <div class="ibox-body" style="display:none;">
                                        <div class="row">
                                        <div class="col-md-6 form-group">
                                                <label> ContactUs_Title</label>
                                                <input class="form-control" type="text"
                                                    value="{{$detail->contact_us_title}}"
                                                    name="contact_us_title"
                                                    placeholder="Enter  Contact Us Title">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Contact us Page Sub_Description</label>
                                                <textarea name="contact_us_sub"
                                                    placeholder="Enter sub Description" class="form-control" rows="3"
                                                    cols="80">{{$detail->contact_us_sub}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Site Setting</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body" style="">

                        <div class="row">
                        <div class="col-sm-6 form-group">
                                <label>Header Notes</label>
                                <input class="form-control" type="text" value="{{$detail->notes}}" name="notes"
                                    placeholder="Enter Header Notes">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Site Name</label>
                                <input class="form-control" type="text" name="site_name" value="{{$detail->site_name}}"
                                    placeholder="Enter Site name">
                            </div>
                           
                        </div>
                        <div class="row">
                        <div class="col-sm-6 form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" value="{{$detail->address}}" name="address"
                                    placeholder="Enter Address">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="{{$detail->email}}" name="email"
                                    placeholder="Enter Email Address">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Telephone</label>
                                <input class="form-control" type="text" value="{{$detail->telephone}}" name="telephone"
                                    placeholder="Enter Telephone">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Mobile</label>
                                <input class="form-control" type="text" value="{{$detail->mobile}}" name="mobile"
                                    placeholder="Enter Mobile">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Post Box</label>
                                <input class="form-control" type="text" value="{{$detail->post_box}}" name="post_box"
                                    placeholder="Enter Post Box">
                            </div>

                        </div>

                        <!-- Office Details Section -->
                        <div class="ibox mt-4">
                            <div class="ibox-head">
                                <div class="ibox-title">Office Details (For Footer)</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus" style="color: #08182e;"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <!-- Office 1 -->
                                <h5 class="mb-3" style="color: #08182e; border-bottom: 2px solid #f79d18; padding-bottom: 10px;">Office 1</h5>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Office 1 Name</label>
                                        <input class="form-control" type="text" value="{{$detail->office1_name ?? ''}}" name="office1_name"
                                            placeholder="e.g., Nepal Office">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 1 Address</label>
                                        <textarea class="form-control" name="office1_address" rows="2" placeholder="Enter Office 1 Address">{{$detail->office1_address ?? ''}}</textarea>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 1 Map URL (Google Maps Link)</label>
                                        <input class="form-control" type="url" value="{{$detail->office1_map_url ?? ''}}" name="office1_map_url"
                                            placeholder="https://maps.app.goo.gl/...">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 1 Phone</label>
                                        <input class="form-control" type="text" value="{{$detail->office1_phone ?? ''}}" name="office1_phone"
                                            placeholder="Enter Office 1 Phone">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 1 Email</label>
                                        <input class="form-control" type="email" value="{{$detail->office1_email ?? ''}}" name="office1_email"
                                            placeholder="Enter Office 1 Email">
                                    </div>
                                </div>

                                <!-- Office 2 -->
                                <h5 class="mb-3 mt-4" style="color: #08182e; border-bottom: 2px solid #f79d18; padding-bottom: 10px;">Office 2</h5>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Office 2 Name</label>
                                        <input class="form-control" type="text" value="{{$detail->office2_name ?? ''}}" name="office2_name"
                                            placeholder="e.g., Australia Office">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 2 Address</label>
                                        <textarea class="form-control" name="office2_address" rows="2" placeholder="Enter Office 2 Address">{{$detail->office2_address ?? ''}}</textarea>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 2 Map URL (Google Maps Link)</label>
                                        <input class="form-control" type="url" value="{{$detail->office2_map_url ?? ''}}" name="office2_map_url"
                                            placeholder="https://maps.app.goo.gl/...">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 2 Phone</label>
                                        <input class="form-control" type="text" value="{{$detail->office2_phone ?? ''}}" name="office2_phone"
                                            placeholder="Enter Office 2 Phone">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 2 Email</label>
                                        <input class="form-control" type="email" value="{{$detail->office2_email ?? ''}}" name="office2_email"
                                            placeholder="Enter Office 2 Email">
                                    </div>
                                </div>

                                <!-- Office 3 -->
                                <h5 class="mb-3 mt-4" style="color: #08182e; border-bottom: 2px solid #f79d18; padding-bottom: 10px;">Office 3</h5>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Office 3 Name</label>
                                        <input class="form-control" type="text" value="{{$detail->office3_name ?? ''}}" name="office3_name"
                                            placeholder="e.g., Dubai Office">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 3 Address</label>
                                        <textarea class="form-control" name="office3_address" rows="2" placeholder="Enter Office 3 Address">{{$detail->office3_address ?? ''}}</textarea>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Office 3 Map URL (Google Maps Link)</label>
                                        <input class="form-control" type="url" value="{{$detail->office3_map_url ?? ''}}" name="office3_map_url"
                                            placeholder="https://maps.app.goo.gl/...">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 3 Phone</label>
                                        <input class="form-control" type="text" value="{{$detail->office3_phone ?? ''}}" name="office3_phone"
                                            placeholder="Enter Office 3 Phone">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Office 3 Email</label>
                                        <input class="form-control" type="email" value="{{$detail->office3_email ?? ''}}" name="office3_email"
                                            placeholder="Enter Office 3 Email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" placeholder="Enter Description" class="form-control" rows="3"
                                cols="80">{{$detail->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Google Map</label>
                            <input type="text" name="googlemap" placeholder="Enter Google Map Link"
                                value="{{$detail->googlemap}}" class="form-control">
                        </div>

                        <div class="row">

                            <div class="col-sm-6 form-group">
                                <label>Logo</label>
                                <input type="file" id="fileUpload" name="logo" value="{{$detail->logo}}"
                                    class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">

                                        @if($detail->logo)
                                        <img src="{{asset('images/main/' . $detail->logo)}}" alt="" class="thumb-image"
                                            height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Contactus Banner Image</label>
                                <input type="file" id="fileUpload2" name="contactus_banner_image"
                                    value="{{$detail->contactus_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder2">

                                        @if($detail->contactus_banner_image)
                                        <img src="{{asset('images/main/' . $detail->contactus_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 form-group">
                                <label>About Us Banner Image</label>
                                <input type="file" id="fileUpload1" name="aboutus_banner_image"
                                    value="{{$detail->aboutus_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->aboutus_banner_image)
                                        <img src="{{asset('images/main/' . $detail->aboutus_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Teams Banner Image</label>
                                <input type="file" id="fileUpload1" name="teams_banner_image"
                                    value="{{$detail->teams_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->teams_banner_image)
                                        <img src="{{asset('images/main/' . $detail->teams_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                 
                            <div class="col-sm-6 form-group">
                                <label>Resource Banner Image</label>
                                <input type="file" id="fileUpload1" name="resource_banner_image"
                                    value="{{$detail->resource_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->resource_banner_image)
                                        <img src="{{asset('images/main/' . $detail->resource_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Services Banner Image</label>
                                <input type="file" id="fileUpload1" name="services_banner_image"
                                    value="{{$detail->services_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->services_banner_image)
                                        <img src="{{asset('images/main/' . $detail->services_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>

                          <div class="col-sm-6 form-group">
                                <label>Products Banner Image</label>
                                <input type="file" id="fileUpload1" name="products_banner_image"
                                    value="{{$detail->products_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->products_banner_image)
                                        <img src="{{asset('images/main/' . $detail->products_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Projects Banner Image</label>
                                <input type="file" id="fileUpload1" name="projects_banner_image"
                                    value="{{$detail->projects_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->projects_banner_image)
                                        <img src="{{asset('images/main/' . $detail->projects_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Testimonial Banner Image</label>
                                <input type="file" id="fileUpload1" name="testimonials_banner_image"
                                    value="{{$detail->testimonials_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->testimonials_banner_image)
                                        <img src="{{asset('images/main/' . $detail->testimonials_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Career Banner Image</label>
                                <input type="file" id="fileUpload1" name="career_banner_image"
                                    value="{{$detail->career_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->career_banner_image)
                                        <img src="{{asset('images/main/' . $detail->career_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                          
                          <div class="col-sm-6 form-group">
                                <label>Partners Banner Image</label>
                                <input type="file" id="fileUpload1" name="partners_banner_image"
                                    value="{{$detail->partners_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->partners_banner_image)
                                        <img src="{{asset('images/main/' . $detail->partners_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                          
                           <div class="col-sm-6 form-group">
                                <label>Download Banner Image</label>
                                <input type="file" id="fileUpload1" name="download_banner_image"
                                    value="{{$detail->download_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->download_banner_image)
                                        <img src="{{asset('images/main/' . $detail->download_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                          
                          <div class="col-sm-6 form-group">
                                <label>Training Banner Image</label>
                                <input type="file" id="fileUpload1" name="training_banner_image"
                                    value="{{$detail->training_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->training_banner_image)
                                        <img src="{{asset('images/main/' . $detail->training_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                          
                           <div class="col-sm-6 form-group">
                                <label>Tools Banner Image</label>
                                <input type="file" id="fileUpload1" name="tools_banner_image"
                                    value="{{$detail->tools_banner_image}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder1">
                                        @if($detail->tools_banner_image)
                                        <img src="{{asset('images/main/' . $detail->tools_banner_image)}}" alt=""
                                            class="thumb-image" height="120px" width="120px">
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </form>

</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')

<script>

    $(document).ready(function () {

        $("#fileUpload").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");

                $("#image-holder").siblings().remove();

                $("#image-holder").children().remove();

                var reader = new FileReader();
                reader.onload = function (e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });


        $("#fileUpload1").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder1");

                $("#image-holder").siblings().remove();

                $("#image-holder1").children().remove();

                var reader = new FileReader();
                reader.onload = function (e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });


        $("#fileUpload2").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder2");

                $("#image-holder").siblings().remove();

                $("#image-holder2").children().remove();

                var reader = new FileReader();
                reader.onload = function (e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }

        });

        $("#fileUpload3").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder3");

                $("#image-holder").siblings().remove();

                $("#image-holder3").children().remove();

                var reader = new FileReader();
                reader.onload = function (e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

    });
</script>



@endpush