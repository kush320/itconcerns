@extends('admin.layouts.app')

@push('styles')
  <style media="screen">
    .line{
       width:100%;
       height: 1px;
       background-color: green;
    }
  </style>
@endpush

@section('content')


<div class="page-content fade-in-up">
  <form method="post" action="{{route('resource.update', $detail->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">SEO Details</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
                      
                    </div>
                </div>
                  <!-- @include('admin.layouts._partials.messages.info') -->
                <div class="ibox-body" style="display:none;">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                      <div class="row">
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" value="{{$detail->meta_title}}" name="meta_title" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{$detail->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Keyphrase</label>
                                <input class="form-control" type="text" value="{{$detail->meta_keyphrase}}" name="meta_keyphrase" placeholder="Enter Meta Keyphrase">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Canonical Url</label>
                                <input class="form-control" type="text" value="{{$detail->canonical_url}}" name="canonical_url" placeholder="Enter Canonical Url">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword" placeholder="Enter Keywords">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Json+Ld Data</label>
                                <textarea name="json_ld" class="form-control" rows="8" cols="80">{{$detail->json_ld}}</textarea>
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
                                <div class="ibox-title">Edit Resource</div>

                                <div class="ibox-tools">

                                </div>
                            </div>

                            <div class="ibox-body" style="">

                              <div class="row">

                                  <div class="form-group col-md-6">
                                      <label>Title</label>
                                      <input class="form-control" name="title" value="{{$detail->title}}" type="text" placeholder="Enter Blog Title">
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label>Slug</label>
                                      <input class="form-control" name="slug" value="{{$detail->slug}}" type="text" placeholder="Enter Blog Slug">
                                  </div>
                        <div class="form-group col-md-6">
                                <label>Author</label>
                                <input class="form-control" name="name" value="{{ Auth::user()->name }}" type="text">
                            </div>
                                
                                  <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" name="date" placeholder="Select Date" class="form-control"
                                    value="{{ $detail->date  }}" required >
                            </div>
                              </div>
           
                                  <div class="form-group">
                                      <label>Short Description</label>
                                      <textarea name="short_description" class="form-control" rows="3">{{$detail->short_description}}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label>Description</label>
                                      <textarea name="description" class="form-control" rows="8" cols="80">{{$detail->description}}</textarea>
                                  </div>

                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <input  class="form-control" id="fileUpload" name="banner_image" type="file">
                                        <div id="wrapper" class="mt-2">
                                            <div id="image-holder">
                                              @if($detail->banner_image)
                                                 <img src="{{asset('/images/thumbnail/'. $detail->banner_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                              @endif
                                            </div>
                                        </div>
                                    </div>

                              
                                  <div class="check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox" {{$detail->published == 1 ? 'checked' : ''}}>
                                      <span class="input-span"></span>Publish</label>
                                  </div>
                                  <br>
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

@endpush
