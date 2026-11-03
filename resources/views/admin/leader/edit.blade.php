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
    <form method="post" action="{{route('leaders.update', $detail->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Leaders</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$detail->name}}" type="text"
                                    placeholder="Enter Name">
                            </div>


                            <div class="form-group col-md-4">
                                <label>Position (Post)</label>
                                <input class="form-control" name="post" value="{{$detail->post}}" type="text"
                                    placeholder="Enter Position">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Enter Leader Description">{{$detail->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" id="fileUpload" name="image" type="file">
                            <br>
                            <!-- {!!$errors->first('image', '<span class="text-danger has-error">:message</span>')!!} -->
                            <div id="wrapper" class="mt-2">
                                <div id="image-holder">
                                    @if($detail->image)
                                    <img src="{{asset('/images/main/'. $detail->image)}}"
                                        style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px"
                                        alt="">
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Instagram Link</label>
                                <input class="form-control" type="text" value="{{$detail->instagram}}" name="instagram"
                                    placeholder="Enter Instagram Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" value="{{$detail->facebook}}" name="facebook"
                                    placeholder="Enter Facebook Link">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Twitter Link</label>
                                <input class="form-control" type="text" value="{{$detail->twitter}}" name="twitter"
                                    placeholder="Enter Twitter Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" value="{{$detail->linkedin}}" name="linkedin"
                                    placeholder="Enter Linkedin Link">
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