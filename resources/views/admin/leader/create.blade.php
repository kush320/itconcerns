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
    <form method="post" action="{{route('leaders.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Leaders</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{old('name')}}" type="text"
                                    placeholder="Enter Name">
                                <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                            </div>

                            <div class="form-group col-md-6">
                                <label>Position (Post)</label>
                                <input class="form-control" name="post" value="{{old('post')}}" type="text"
                                    placeholder="Enter Position">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Enter Leader Description">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" id="fileUpload" name="image" type="file">
                            <br>
                            <!-- {!!$errors->first('image', '<span class="text-danger has-error">:message</span>')!!} -->
                            <div id="wrapper" class="mt-2">
                                <div id="image-holder"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Instagram Link</label>
                                <input class="form-control" type="text" name="instagram"
                                    placeholder="Enter Instagram Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" name="facebook"
                                    placeholder="Enter Facebook Link">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Twitter Link</label>
                                <input class="form-control" type="text" name="twitter" placeholder="Enter Twitter Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" name="linkedin" placeholder="Enter Linkedin Link">
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