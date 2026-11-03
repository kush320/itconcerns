@extends('frontend.layouts.app')
@section('meta_title', $details->meta_title)
@section('meta_description', $details->meta_description)
@section('keywords', $details->keyword)
@section('meta_keyphrase', $details->meta_keyphrase)
@section('canonical_url', $details->canonical_url)
@section('meta')
<meta property="og:title" content="{{ $details->title }}" />
<meta property="og:description" content="{{ $details->short_description }}" />
<meta property="og:image" content="{{ asset('/images/main/' . $details->banner_image) }}" />
<meta property="og:url" content="{{ route('resourceDetails', $details->slug) }}" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
@endsection

@section('content')
<style>
    #social-links {
  list-style: none; 
  display: flex;
  margin-left:-25px;
}

#social-links li {
  display:inline-block; 
}

#social-links li a {
 margin: 3px;
    font-size:20px; 
  color: #08182e; 
}

#social-links li a:hover {
  color: #f79d18; /* Change color on hover */
}

#social-links li i {
  margin-right: 5px; /* Space between icon and text */
}

</style>


<style>
  .widget-post-item-border {
    border-top: 2.5px solid white;
    border-bottom: 2.5px solid white;
  }
</style>

<!-- Page Header Start -->
<div class="page-header">
    <div class="text-center py-6"
        style="background-image: url('{{ asset('images/main/' . $dashboard_composer->resource_banner_image) }}');">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Our Resources</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Resource Single -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1>Latest Resources & News</h1>
        </div>
    </div>
</div>
<section class="blog blog-single pt-70 pb-70">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="post-item mb-0">
          <div class="post__img">
            <a href="#">
              <img src="{{ asset('/images/main/' . $details->banner_image) }}""alt="{{$details->title}}">
            </a>
          </div><!-- /.post-img -->
          <div class="post__content">
            <div class="post__meta d-inline-flex flex-wrap align-items-center mb-0">
              <span class="post__meta-author">
                <span class="color-secondary" style="color: #08182e;">By:</span>
                <a class="color-body" style="color: #fd9d1f;">{{ $details->name }}</a>
              </span>
              <span class="post__meta-date" style="color: #08182e;">{{ $details->updated_at->format('M d, Y') }}</span>
            </div><!-- /.blog-meta -->
            <h1 class="post__title">{{ $details->title }}</h1>
            <div class="post__desc">
              <!--<p style="text-align: justify;">{{ $details->short_description }}</p>-->
              <p style="text-align: justify;">{!! $details->description !!}</p>
            </div><!-- /.blog-desc -->
          </div>
        </div><!-- /.post-item -->

        <div class="col-sm-12 col-md-6 col-lg-6 d-flex " style="margin: 10px;">
          <div class="blog-share d-flex flex-wrap">
            <strong class="mr-20 color-heading">Share:</strong>
            <ul id="social-links">
              @foreach($shareLinks as $platform => $link)
                @php
                  $iconClass = '';
                  switch ($platform) {
                    case 'facebook':
                      $iconClass = 'fab fa-facebook-square';
                      break;
                    case 'twitter':
                      $iconClass = 'fab fa-twitter';
                      break;
                    case 'linkedin':
                      $iconClass = 'fab fa-linkedin';
                      break;
                    case 'telegram':
                      $iconClass = 'fab fa-telegram';
                      break;
                    case 'whatsapp':
                      $iconClass = 'fab fa-whatsapp';
                      break;
                  }
                @endphp
                <li><a href="{{ $link }}" target="_blank" title="Share on {{ ucfirst($platform) }}"><i class="{{ $iconClass }}"></i></a></li>
              @endforeach
            </ul>
          </div><!-- /.blog-share -->
        </div>
      </div><!-- /.col-lg-8 -->

     <div class="col-sm-12 col-md-12 col-lg-4"style="padding-bottom: 15px;">
  <aside class="sidebar" style="background-color: #80808063; position: -webkit-sticky; position: sticky; top: 70px;">
    <div class="widget widget-posts">
      <h5 class="recent-post r-margin" style="margin-bottom: 0px;">Recent Resource</h5>
      <div class="widget__content" style="max-height: 570px; overflow-y: auto;">
        <!-- post item #1 -->
        @foreach($recentResources as $resource)
        <div class="widget-post-item d-flex align-items-center widget-post-item-border">
          <div class="widget-post__img" style="margin: 15px;">
            <a href="{{ route('resourceDetails', $resource->slug) }}">
              <img src="{{ asset('/images/main/' . $resource->banner_image) }}" style="width:95.91px;height: 70px;" alt="{{$resource->title}}">
            </a>
          </div>
          <div class="widget-post__content">
            <h4 class="widget-post__title" style="font-size: large;">
              <a href="{{ route('resourceDetails', $resource->slug) }}">{{ $resource->title }}</a>
            </h4>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </aside>
</div>


    </div>
  </div>
</section>
@endsection
