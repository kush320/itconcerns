@extends('frontend.layouts.app')

@section('meta_title', $dashboard_composer->meta_download_title)
@section('meta_description', $dashboard_composer->meta_download_description)
@section('canonical_url', $dashboard_composer->canonical_url_download)

@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="text-center py-6"
         style="background-image: url('{{ asset('images/main/' . $dashboard_composer->download_banner_image) }}');" alt="{{$dashboard_composer->download_banner_image}}">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Downloads</h1>
    </div>
</div>
<!-- Page Header End -->

<section class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1 class="text-primary">Access Essential Resources</h1>
            <p>Empower your knowledge with a curated selection of downloadable resources, crafted to support your growth and success in various fields.</p>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="right-nav-menu" style="position: -webkit-sticky; position: sticky; top: 70px;">
                    <div class="recent-post r-margin" style="text-align: center; color: white; width: 100%; background-color: #08182e; padding: 10px 5px 5px 5px;">
                        <h4 style="color: white;">Categories</h4>
                    </div>
                    <ul class="list-unstyled" style="padding: 15px; background-color: #b3b2b2; margin-bottom: 0px; font-size: large;">
                        @foreach ($download_categories as $category)
                            <li style="line-height: 1rem; border-bottom: 1px solid #eee; padding: 10px 0;">
                                <a href="{{ route('downloads', $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="tab-content" id="pills-tabContent">
                    @if($selectedCategory)
                        <div class="tab-pane fade show active">
                            <table class="table table-bordered table-hover table-striped" style="vertical-align: middle">
                                <thead>
                                    <tr>
                                        <th class="w-16 text-center" style="color: gray;">S.N.</th>
                                        <th style="color: gray">File Name</th>
                                        <th class="text-center w-32" style="color: gray;">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($selectedCategory->downloads as $download)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $download->name }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{ asset('uploads/'.$download->file) }}" class="btn btn-secondary mx-auto flex place-items-center place-content-center w-auto" target="_blank">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="contact-sidebar" style="border: 1px solid #08182e; margin-bottom: 20px;">
                    <div class="recent-post" style="text-align: center; width: 100%; padding: 10px 5px 5px 5px; background-color: #08182e;">
                        <h4 style="color: #ffffff;">Contact Us</h4>
                    </div>
                    <div class="contact-box" style="display: flex;">
                        <div class="contact-l">
                            <i class="fa fa-globe" aria-hidden="true" style="font-size: 40px; color: #f79d18; padding: 14px 0px 0px 15px;"></i>
                        </div>
                        <div class="contact-r" style="width: calc(100% - 60px); padding: 5px; float: right;">
                            <p style="font-size: 15px; text-align: justify;">Ready to learn more about how we can move your business forward?</p>
                        </div>
                    </div>
                    <a class="btn btn-secondary" href="https://itconcerns.com.np/contact-us" style="margin: 0; width: 100%; border: none; font-weight: 600; border-radius: 0;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
