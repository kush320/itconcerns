@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Customer</div>

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
                    <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                                <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Number</label>
                                <input class="form-control" name="number" value="{{old('number')}}" type="number" placeholder="Enter Number Of Customers">
                                <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                            </div>

                        </div>

                     

                        <div class="row">
                            <div class="col-md-6 check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="published" type="checkbox">
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

@endpush