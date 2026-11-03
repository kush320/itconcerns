@extends('frontend.layouts.app')
@section('meta_title', $detail->meta_title ?? $detail->page_title ?? $detail->title . ' - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', $detail->meta_description ?? strip_tags(\Illuminate\Support\Str::limit($detail->description, 160)))
@section('canonical_url', $detail->canonical_url ?? url()->current())
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="text-center py-6" style="background: linear-gradient(135deg, #08182e 0%, #0d2445 100%); background-size: cover; background-position: center;">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $detail->title }}</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Page Content Start -->
<div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($detail->image)
                <div class="text-center mb-5 wow fadeIn" data-wow-delay=".3s">
                    <img src="{{ asset('images/main/' . $detail->image) }}" class="img-fluid rounded" alt="{{ $detail->title }}" style="max-height: 400px; width: auto;">
                </div>
                @endif
                
                <div class="wow fadeIn" data-wow-delay=".5s">
                    <div class="page-content" style="line-height: 1.8; color: #333;">
                        {!! $detail->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->

@endsection

