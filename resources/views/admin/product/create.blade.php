@extends('admin.layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Product</div>

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

                <div class="ibox-body" style="">
                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                        
                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Button Title</label>
                                <input class="form-control" name="btn_title" value="{{old('btn_title')}}" type="text" placeholder="Enter  Button Title">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Button Link</label>
                                <input class="form-control" name="btn_link" value="{{old('btn_link')}}" type="text" placeholder="Enter BUtton Link">
                            </div>
                        </div>
                      <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" rows="8"
                                    cols="80">{{old('short_description')}}</textarea>
                            </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input id="fileUpload" class="form-control" value="{{old('image')}}" name="image" type="file">
                            <div id="wrapper" class="mt-2">
                                <div id="image-holder">
                                </div>
                            </div>
                        </div>

                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input name="published" type="checkbox">
                                <span class="input-span"></span>Publish</label>
                        </div>

                        <br>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
@endpush