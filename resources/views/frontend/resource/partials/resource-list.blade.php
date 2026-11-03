@foreach($details as $resource)
<div class="col-sm-12 col-md-4 col-lg-4 resource-item">
    <div class="resource shadow h-100" style="margin-bottom:0px;">
        <div class="post__img">
            <a href="{{ route('resourceDetails', ['slug' => $resource->slug]) }}">
                <img src="{{ asset('images/main/' . $resource->banner_image) }}" class="img-fluid" alt="{{ $resource->title }}" style="width: 100%; height: auto;">
            </a>
        </div>
        <div class="post__content p-3 justify-content-between" style="margin:0px;">
            <div class="link-bar mb-2">
                <span class="date"><i class="fa fa-calendar text-secondary"></i> {{ \Carbon\Carbon::parse($resource->date)->format('d M Y') }}</span>
                <span class="user text-primary" style="padding-left: 10px;">
                    <i class="fa fa-user"></i> <span itemprop="author"><a title="Posts by ITC" rel="author" style="color:#f79d18;">{{ $resource->name }}</a></span>
                </span>
            </div>
            <h4 class="post__title" style="font-size: 20px;">
                <a href="{{ route('resourceDetails', ['slug' => $resource->slug]) }}">{{ $resource->title }}</a>
            </h4>
            <p class="post__desc" style="margin-bottom:0px;font-size:15px;text-align:justify;">{{ Str::limit($resource->short_description, 155) }}</p>
        </div>
    </div>
</div>
@endforeach