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
    <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Seo Details</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                              
                            </div>
                        </div>
                        <div class="ibox-body" style="display: none;">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Page Title</label>
                                    <input class="form-control" name="page_title" value="{{old('page_title')}}" type="text" placeholder="Enter Page Title">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Meta Title</label>
                                    <input class="form-control" name="meta_title" value="{{old('meta_title')}}" type="text" placeholder="Enter Meta Title">
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input class="form-control" name="meta_description" value="{{old('meta_description')}}" type="text" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group">
                                <label>Meta Keyphrase</label>
                                <input class="form-control" type="text" value="{{old('meta_keyphrase')}}" name="meta_keyphrase" placeholder="Enter Meta Keyphrase">
                            </div>

                            <div class="form-group">
                                <label>Canonical Url</label>
                                <input class="form-control" type="text" value="{{old('canonical_url')}}" name="canonical_url" placeholder="Enter Canonical Url">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="keywords" value="{{old('keywords')}}" type="text" placeholder="Enter Keywords">
                            </div>
                        </div>
                    </div>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create User</div>

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
                    <a class="btn btn-danger" href="{{ route('user.index') }}"><i class="fa fa-shield"></i> See All Users</a>

                       </div>
                 
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" value="{{old('password')}}" type="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      
                        <div class="form-group">
                        @foreach($roles as $role)
                  <div class="flex flex-col justify-cente">
                      <div class="flex flex-col">
                          <label class="inline-flex items-center mt-3">
                              <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                              ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                          </label>
                      </div>
                  </div>
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
