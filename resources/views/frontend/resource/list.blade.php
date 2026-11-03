@extends('frontend.layouts.app')
@section('meta_title', $dashboard_composer->meta_resource_title)
@section('meta_description', $dashboard_composer->meta_resource_description)
@section('canonical_url', $dashboard_composer->canonical_url_resource)
@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="text-center py-6" style="background-image: url('{{ asset('images/main/' . $dashboard_composer->resource_banner_image) }}');">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Our Resources</h1>
  </div>
</div>
<!-- Page Header End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5 mb-5">
  <div class="container">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h5 class="text-primary">Our Resources</h5>
      <h1>{{ $dashboard_composer->resources_title }}</h1>
    </div>
    <!--- content--->
<div data-trackas="custom-section" style="background-color: #f9f9f9; border: 2.5px dotted #f79d18;" class="custom-section xwidth cpad custom-bg py-2 shadow widget-post-item-border">
    
        <div class="custom-content col-md-12 row" style="display: flex; margin: 15px;">
            <div class="custom-search col-md-6">
                <h4 class="sec-title" id="searchBlogs">Search Our Blogs</h4>
            <div class="search-wrapper">
              <input class="search-input" placeholder="Enter search term..." type="search" id="searchInput">
            </div>
            </div>
           
            <div class="custom-subscribe col-md-6">
                <h4 class="sec-title subscribe-title">Get the Latest Updates</h4>
                <div class="subscribe-buttons">
                    <button class="btn btn-secondary">
                        <a href="https://example.com/subscribe" target="_blank" id="subscribeButton" style="color: white;">Subscribe</a>
                    </button>
                </div>
            </div>
        </div>
   
</div>

<!-----end content--->
    <!-- Resources List -->
    <div class="row  g-5 justify-content-center" id="resource-container"style="padding-top: 70px;">
      @include('frontend.resource.partials.resource-list', ['details' => $details])
    </div>

    <!-- Show More Button -->

    <div class="text-center mt-5">
      <button  class="btn btn-secondary show-more-data" >
        Show More
      </button>
    </div>
        <div class="auto-load text-center" style="display: none;">
        <div class="d-flex justify-content-center">
      <div class="spinner-border text-success" role="status">
  <span class="visually-hidden">Loading...</span>
</div>


        </div>
    </div>

  </div>
</div>
<!-- Blog End -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ route('resourceList') }}";
    var page = 1;

    $(".show-more-data").click(function(){
        page++;
        ShowMore(page);
    });

   function ShowMore(page) {
    $.ajax({
        url: ENDPOINT + "?page=" + page,
        datatype: "json",
        type: "get",
        beforeSend: function () {
            $('.auto-load').show();
        }
    })
    .done(function (response) {
        $('.auto-load').hide();
        if (response.html.includes("No more resources to show")) {
            $('.auto-load').html("No more resources to show.");
            $(".show-more-data").hide(); 
            return;
        }
        $("#resource-container").append(response.html);
       
        if (response.next_page) {
            $(".show-more-data").show();
        } else {
            $(".show-more-data").hide(); 
        }
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occurred');
    });
}

</script>

<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();

        if (query.length >= 3) { 
            $.ajax({
                url: "{{ route('search') }}", 
                type: 'GET',
                data: { search: query }, 
                dataType: 'json',
                beforeSend: function() {
                    $('.auto-load').show(); 
                },
                success: function(response) {
                    $('.auto-load').hide(); 
                    $('#resource-container').html(response.html); 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error:', errorThrown); 
                }
            });
        } else {
            $('#resource-container').html(''); 
        }
    });
});

</script>

@endsection
