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
    <form method="post" action="{{route('trainer.update', $detail->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Trainer</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$detail->name}}" type="text"
                                    placeholder="Enter Name">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Trainings</label>
                                <select name="training_id" class="form-control">
                                    <option value="">-- select one --</option>
                                     @foreach($trainings as $t)
                                    <option value="{{$t->id}}" {{$detail->training_id == $t->id ?'selected':''}}>{{$t->course_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" value="{{$detail->facebook}}" name="facebook"
                                    placeholder="Ente Facebook Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" value="{{$detail->linkedin}}" name="linkedin"
                                    placeholder="Ente Linkedin Link">
                            </div>
                        </div>

                        <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" id="fileUpload" name="image" type="file">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                        @if($detail->image)
                                        <img src="{{asset('/images/thumbnail/'. $detail->image)}}"
                                            style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px"
                                            alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="8"
                                    cols="80">{!!$detail->description!!}</textarea>
                            </div>
                      
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <div class="check-list">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input name="published" type="checkbox" {{$detail->published == 1 ? 'checked' :
                                        ''}}>
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