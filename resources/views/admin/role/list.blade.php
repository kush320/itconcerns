@extends('admin.layouts.app')

@push('styles')
    <link href="{{ asset('/assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <style media="screen">
        .adjust-delete-button {
            margin-top: -28px;
            margin-left: 37px;
        }
    </style>
@endpush

@section('content')
    <div class="page-heading">
        <h1 class="page-title">Roles</h1>
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
                <div class="ibox-title">All Roles</div>
                <div>
                    <a class="btn btn-info btn-md" href="{{ route('role.create') }}">Add Role</a>
                </div>
            </div>

            <div class="ibox-body">
                <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Date Posted</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($role->permissions as $permission)
                                            <div class="badge badge-success p-2 m-1">
                                                {{ $permission->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form class="adjust-delete-button" action="{{ route('role.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">You do not have any Roles yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/assets/admin/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 25,
            });
        })
    </script>
@endpush
