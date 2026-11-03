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
    <form method="post" action="{{route('permission.update', $permission->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Permission</div>

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


                    <div class="line"></div>
                  
                    <div class="ibox-body" style="">
                    <div class="card-tools">
                    <a class="btn btn-danger" href="{{ route('permission.index') }}"><i class="fa fa-shield"></i> See All Permission</a>

                       </div>
                 
                       <div class="form-group">
                       <label>Permission Name</label>
                          <input class="form-control" name="name" value="{{$permission->name}}" type="text" placeholder="Enter Permission Name">
                       </div>

                        <div class="form-group">
                       <button class="btn btn-primary" type="submit">Submit</button>
                       </div>

                    </div>
                </div>
            </div>

        </div>


    </form>

    <pre id="output"></pre>
</div>

@endsection
