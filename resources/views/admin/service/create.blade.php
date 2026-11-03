@extends('admin.layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
        @csrf
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
                                <input class="form-control" type="text" value="{{old('meta_title')}}" name="meta_title"
                                    placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{old('meta_description')}}"
                                    name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Keyphrase</label>
                                <input class="form-control" type="text" value="{{old('meta_keyphrase')}}"
                                    name="meta_keyphrase" placeholder="Enter Meta Keyphrase">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Canonical Url</label>
                                <input class="form-control" type="text" value="{{old('canonical_url')}}"
                                    name="canonical_url" placeholder="Enter Canonical Url">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{old('keyword')}}" name="keyword"
                                    placeholder="Enter Keywords">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Json+Ld Data</label>
                                <textarea name="json_ld" class="form-control" rows="8"
                                    cols="80">{{old('json_ld')}}</textarea>
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
                        <div class="ibox-title">Create Service</div>

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
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{old('title')}}" type="text"
                                    placeholder="Enter Title">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Short_Description</label>
                                <textarea name="short_description" class="form-control" rows="8"
                                    cols="80">{{old('short_description')}}</textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="8"
                                    cols="80">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Icon</label>
                                <input class="form-control" name="icon" value="{{old('icon')}}" type="text"
                                    placeholder="Enter Icon">
                            </div>
                            <div class="col-md-6 -form-group">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input id="fileUpload" class="form-control" value="{{old('image')}}" name="image"
                                        type="file">
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder">
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                        <div class="row">
                           
                            <div class="col-md-4 form-group">
                                <div class="check-list">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input name="published" type="checkbox">
                                        <span class="input-span"></span>Publish</label>
                                </div>
                            </div>
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