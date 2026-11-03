@extends('admin.layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Google Cloud Solution</div>

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
                    <form method="post" action="{{route('google-cloud-solution.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                        
                            <div class="col-md-6 form-group">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter product name">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Product Price (Optional)</label>
                                <input class="form-control" name="price" value="{{old('price')}}" type="number" step="0.01" placeholder="Enter product price">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Product Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control ckeditor" rows="6" cols="80">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Features <span class="text-danger">*</span></label>
                            <textarea name="features" class="form-control ckeditor" rows="6" cols="80" placeholder="Enter features (one per line or use bullet points)">{{old('features')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Image (Optional)</label>
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
