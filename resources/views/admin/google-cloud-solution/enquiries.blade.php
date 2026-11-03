@extends('admin.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<style media="screen">
.btn-actions {
    display: flex;
    gap: 8px;
}
#example-table {
    font-size: 1rem;
}
#example-table th {
    font-size: 1rem;
    padding: 15px 10px;
    background: #f8f9fa;
}
#example-table td {
    padding: 15px 10px;
    vertical-align: middle;
}
.badge-primary {
    font-size: 0.9rem;
    padding: 8px 12px;
}
.btn-info, .btn-danger {
    padding: 8px 12px;
}
.btn-info i, .btn-danger i {
    font-size: 1rem;
}
</style>
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">Google Cloud Solution Enquiries</h1>
 
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Enquiries ({{ $enquiries->count() }})</div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>                    
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Organization</th>
                      <th>Service</th>
                      <th>Country</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                  @if($enquiries->count())
                    @foreach($enquiries as $key => $data)
                    <tr>
                      <td class="pl-3">{{$key + 1}}</td>
                      <td>{{$data->full_name}}</td>
                      <td><a href="mailto:{{$data->business_email}}">{{$data->business_email}}</a></td>
                      <td>{{$data->organization_name}}</td>
                      <td><span class="badge badge-primary">{{$data->google_cloud_service}}</span></td>
                      <td>{{$data->country}}</td>
                      <td>{{$data->created_at->format('M d, Y')}}</td>
                        <td>
                            <div class="btn-actions">
                                <a href="{{route('google-cloud-solution-enquiry.show', $data->id)}}" class="btn btn-info btn-sm" title="View Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{route('google-cloud-solution-enquiry.destroy', $data->id)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this enquiry?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            No enquiries yet.
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
                order: [[6, 'desc']]
            });
        });
    </script>
@endpush
