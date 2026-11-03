@extends('admin.layouts.app')
@push('styles')
    <link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

    <style media="screen">
        .adjust-delete-button {
            margin-top: -28px;
            margin-left: 37px;
        }
    </style>
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">Trainer</h1>

    @include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Trainer</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('trainer.create')}}">Add Trainer</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Fackbook</th>
                        <th>Linkedin</th>
                        <th>Description</th>
                        <th>Published</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    @if($details->count())
                        @foreach($details as $key => $data)

                            <tr class="row1" data-id="{{ $data->id }}">
                                <td class="pl-3">{{$key + 1}}</td>
                                <td>{{$data->name}}</td>
                                <td><a href="/images/main/{{$data->image}}" target="_blank"><img
                                            style="height:90px; width: 90px;"
                                            src="{{$data->image ? asset('/images/main/' . $data->image) : '/assets/admin/images/image.jpg' }}"></a>
                                </td>
                                <td>{{$data->facebook}}</td>
                                <td>{{$data->linkedin}}</td>
                                <td>{!!$data->description!!}</td>
                                <td><button
                                        class="btn btn-sm {{$data->published == 1 ? 'btn-primary' : 'btn-danger'}}">{{$data->published == 1 ? 'True' : 'False'}}</button>
                                </td>
                                <td>
                                    <a href="{{route('trainer.edit', $data->id)}}" class="btn btn-success btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    <form class="adjust-delete-button" action="{{route('trainer.destroy', $data->id)}}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button"
                                            style="border-radius:50%"
                                            onclick="return confirm('Are you sure you want to delete this Trainer?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">
                                You do not have any data yet.
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>

</div>


@endsection
@push('scripts')
    <script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('#example-table').DataTable({
                pageLength: 25,
            });
        });

        
    </script>
@endpush