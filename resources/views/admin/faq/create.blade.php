@extends('admin.layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <form method="post" action="{{route('faq.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create FAQ</div>

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
                                <label>Questions</label>
                                <input class="form-control" name="question" value="{{old('question')}}" type="text" placeholder="Enter Question">
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Answer</label>
                                <textarea name="answer" class="form-control" rows="8" cols="80">{{old('answer')}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="form-group col-md-6">
                                <label>Block in FAQ</label>
                                <select name="block" class="form-control">
                                    <option value="">-- select one --</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                </select>
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