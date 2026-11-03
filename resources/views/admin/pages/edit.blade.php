@extends('admin.layouts.app')

@push('styles')
<style media="screen">
  .line {
    width: 100%;
    height: 1px;
    background-color: green;
  }
</style>
@endpush

@section('content')

<div class="page-content fade-in-up">
  <form method="post" action="{{route('pages.update', $detail->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-md-12">

        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">Seo Details</div>
            <div class="ibox-tools">
              <a class="ibox-collapse"><i class="fa fa-plus"style="color: #08182e;"></i></a>
              <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

            </div>
          </div>
          <div class="ibox-body" style="display: none;">

            <div class="row">
              <div class="col-md-6 form-group">
                <label>Page Title</label>
                <input class="form-control" name="page_title" value="{{$detail->page_title}}" type="text"
                  placeholder="Enter Page Title">
              </div>

              <div class="col-md-6 form-group">
                <label>Meta Title</label>
                <input class="form-control" name="meta_title" value="{{$detail->meta_title}}" type="text"
                  placeholder="Enter Meta Title">
              </div>

            </div>

            <div class="form-group">
              <label>Meta Description</label>
              <input class="form-control" name="meta_description" value="{{$detail->meta_description}}" type="text"
                placeholder="Enter Meta Description">
            </div>

            <div class="form-group">
              <label>Meta Keyphrase</label>
              <input class="form-control" type="text" value="{{$detail->meta_keyphrase}}" name="meta_keyphrase"
                placeholder="Enter Meta Keyphrase">
            </div>

            <div class="form-group">
              <label>Canonical Url</label>
              <input class="form-control" type="text" value="{{$detail->canonical_url}}" name="canonical_url"
                placeholder="Enter Canonical Url">
            </div>

            <div class="form-group">
              <label>Keywords</label>
              <input class="form-control" name="keywords" value="{{$detail->keyword ?? ''}}" type="text"
                placeholder="Enter Keywords">
            </div>
          </div>
        </div>

        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">Edit Page</div>

            <div class="ibox-tools">

            </div>
          </div>
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif


          <div class="line"></div>
          <!-- <h3>Blog Details</h3> -->
          <div class="ibox-body" style="">

            <div class="form-group">
              <label>Title</label>
              <input class="form-control" name="title" value="{{$detail->title}}" type="text" placeholder="Enter Title">
            </div>


            <div class="form-group">
              <label>Slug</label>
              <input class="form-control" name="slug" value="{{$detail->slug}}" type="text" placeholder="Enter Slug"
                {{in_array($detail->slug, $readonlyslug) ? 'readonly' : ''}}>
            </div>


            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="8" cols="80">{{$detail->description}}</textarea>
            </div>

            <div class="form-group">
              <label>Image</label>
              <input id="fileUpload" class="form-control" value="" name="image" type="file">
              <div id="wrapper" class="mt-2">
                <div id="image-holder">
                  @if($detail->image)
                  <img src="{{asset('images/main/'. $detail->image)}}" style="margin-top:12px; margin-bottom:12px;"
                    height="120px" width="120px" alt="">
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label>Group</label>
              <select name="group_by" class="form-control">
                <option value="">-- select one --</option>
                <option value="general" {{$detail->group_by=='general' ? 'selected' : ''}}>General</option>
                <option value="service" {{$detail->group_by=='service' ? 'selected' : ''}}>Service</option>
              </select>
            </div>
            <div class="check-list">
              <label class="ui-checkbox ui-checkbox-primary">
                <input name="published" type="checkbox" {{$detail->published ? 'checked' : ''}}>
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