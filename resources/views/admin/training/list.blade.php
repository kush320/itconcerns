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
    <h1 class="page-title">Trainings</h1>
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Trainings</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('training.create')}}">Add Training</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Course Title</th>
                      <th>Slug</th>
                      <th>Duration</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Pre-Requisite</th>
                      <th>Venue</th>
                      <th>Short Description</th>
                      <th>Published</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                  @if($details->count())
                    @foreach($details as $key => $data)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->course_title}}</td>
                      <td>{{$data->slug}}</td>
                      <td>{{$data->duration}}</td>
                      <td>{{ \Carbon\Carbon::parse($data->date)->format('d F Y') }}</td>
                      <td>{{$data->time}}</td>
                      <td>{{$data->pre_requisite}}</td>
                      <td>{{$data->venue}}</td>
                      <td>{{$data->short_description}}</td>

                      <td><button class="btn btn-sm {{$data->published == 1 ? 'btn-primary' : 'btn-danger'}}">{{$data->published == 1 ? 'True' : 'False'}}</button></td>

                        <td>
                            <a href="{{route('training.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                            <form class="adjust-delete-button" action="{{route('training.destroy', $data->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this Training ?')"><i class="fa fa-trash"></i></button>
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
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,

        });
    })
</script>
@endpush
