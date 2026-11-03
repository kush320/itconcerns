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
<form method="post" action="{{ route('role.update', $role->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Role</div>

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
                    <a class="btn btn-danger" href="{{ route('role.index') }}"><i class="fa fa-shield"></i> See All Roles</a>

                       </div>
                 
                       <div class="form-group">
                       <label>Role Name</label>
                          <input class="form-control" name="name" value="{{$role->name}}" type="text" placeholder="Enter Role Name">
                       </div>
                       <div class="form-group col-span-4 sm:col-span-2 md:col-span-1">
                  @foreach($permissions as $permission)
                  <label class="inline-flex items-center mt-3">
                              <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}" 
                               @if(count($role->permissions->where('id',$permission->id)))
                                  checked 
                                @endif
                              ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                          </label>
            @endforeach
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
