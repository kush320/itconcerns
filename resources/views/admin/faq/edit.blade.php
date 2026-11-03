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
    <form method="post" action="{{route('faq.update', $detail->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit FAQ</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Question</label>
                                <input class="form-control" name="question" value="{{$detail->question}}" type="text"
                                    placeholder="Enter Questions">
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control" rows="8"
                                cols="80">{{$detail->answer}}</textarea>
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