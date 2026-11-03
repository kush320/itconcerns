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
    <h1 class="page-title">Permission</h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All News</li>
    </ol> -->
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Permission</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('permission.create')}}">Add Permission</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Date Posted</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($permissions as $permission)

                    <tr>
                      <td>{{$permission->id}}</td>
                      <td>{{$permission->name}}</td>
                      
                      <td>{{$permission->created_at}}</td>
                      
                        <td>
                            <a href="{{route('permission.edit', $permission->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                              <form class="adjust-delete-button" action="{{route('permission.destroy', $permission->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                              </form>
                        
                        </td>
                    </tr>
                    @endforeach
                
                    <tr>
                        <td colspan="8">
                            You do not have any Pages yet.
                        </td>
                    </tr>
              
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
