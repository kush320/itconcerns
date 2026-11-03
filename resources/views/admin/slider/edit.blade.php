@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Slider</div>

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
                    <form method="post" action="{{route('slider.update',$detail->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                           

                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{$detail->title}}" type="text" placeholder="Enter Title">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Subtitle</label>
                                <input class="form-control" name="subtitle" value="{{$detail->subtitle}}" type="text" placeholder="Enter Sub Title">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Button Title</label>
                                <input class="form-control" name="btn_title" value="{{$detail->btn_title}}" type="text" placeholder="Enter  Button Title">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Button Link</label>
                                <input class="form-control" name="btn_link" value="{{$detail->btn_link}}" type="text" placeholder="Enter BUtton Link">
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input id="fileUpload" class="form-control" value="" name="image" type="file">
                            <br>
                            <div id="wrapper" class="mt-2">
                                <div id="image-holder">
                                    @if($detail->image)
                                    <img src="{{asset('/images/main/'.$detail->image)}}" alt="" height="120px" width:"120px">
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