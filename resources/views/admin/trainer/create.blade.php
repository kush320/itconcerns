@extends('admin.layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <form method="post" action="{{route('trainer.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Trainer</div>

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
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{old('name')}}" type="text"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Trainings</label>
                                    <select name="training_id" class="form-control">
                                        <option value="">-- select one --</option>
                                        @foreach($trainings as $t)
                                            <option value="{{$t->id}}">{{$t->course_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" value="{{old('facebook')}}" name="facebook"
                                    placeholder="Ente Facebook Link">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" value="{{old('linkedin')}}" name="linkedin"
                                    placeholder="Ente Linkedin Link">
                            </div>

                            <div class="col-md-12 form-group">
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
                               

                         
                            <div class="col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="8"
                                    cols="80">{{old('description')}}</textarea>
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