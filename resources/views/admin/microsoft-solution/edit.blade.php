@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Microsoft Solution</div>

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
                    <form method="post" action="{{route('microsoft-solution.update', $detail->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                           

                            <div class="col-md-6 form-group">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Product Name">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Product Price (Optional)</label>
                                <input class="form-control" name="price" value="{{$detail->price}}" type="number" step="0.01" placeholder="Enter Product Price">
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Product Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control ckeditor" rows="6">{{$detail->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Features <span class="text-danger">*</span></label>
                            <textarea name="features" class="form-control ckeditor" rows="6">{{$detail->features}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Image</label>
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

