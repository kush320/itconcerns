@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Customer</div>

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
                    <form method="post" action="{{route('customers.update', $detail->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>title</label>
                                <input class="form-control" name="title" value="{{$detail->title}}" type="text" placeholder="Enter Title">
                                <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Number</label>
                                <input class="form-control" name="number" value="{{$detail->title}}" type="number" placeholder="Enter Number of Customers">
                                <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="published" type="checkbox" {{$detail->published ? 'checked' : ''}}>
                                    <span class="input-span"></span>Publish</label>
                            </div>


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

<script>
    $(document).ready(function() {

        $("#fileUpload").on('change', function() {

            if (typeof(FileReader) != "undefined") {

                var image_holder = $("#image-holder");

                // console.log($("#image-holder"));
                $("#image-holder").children().remove();

                var reader = new FileReader();
                reader.onload = function(e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

    });
</script>


@endpush