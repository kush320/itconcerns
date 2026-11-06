@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_product_title)
@section('meta_description', $dashboard_composer->meta_product_description)
@section('canonical_url', $dashboard_composer->canonical_url_product)
@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('{{ asset('images/main/' . $dashboard_composer->products_banner_image) }}');">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Our Products</h1>
  </div>
</div>
<!-- Page Header End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <!-- <h5 class="text-primary">Our Products</h5> -->
      <h1>Products Tailored Specifically for Your Needs</h1>
    </div>
    <div class="row g-5 justify-content-center">
      @foreach($products as $product)
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="resource shadow h-100" style="margin-bottom:0px;">
          <div class="post__img">
            <a href="{{$product->btn_link}}" target="_blank">
              <img src="{{ asset('images/main/' . $product->image) }}" class="img-fluid" alt="{{$product->title}}">
            </a>
          </div>
          <div class="post__content p-3 justify-content-between" style="margin:0px;">
              <h4 class="post__title" style="font-size: 25px;"><a href="{{$product->btn_link}}"target="_blank">{{ $product->title }}</a></h4>
              <p class="post__desc" style="margin-bottom:0px;font-size:15px;text-align:justify;">{{ Str::limit($product->short_description, 150) }}</p>
            </div>
            <a href="{{$product->btn_link}}" class="btn btn-link"target="_blank">
                  <span>{{$product->btn_title}}</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
