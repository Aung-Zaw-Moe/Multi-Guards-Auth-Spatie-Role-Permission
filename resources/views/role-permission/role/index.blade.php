@extends('admin.main')
@section('content')

    {{-- <div class="container mt-5">
        <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
        <a href="{{ url('permissions') }}" class="btn btn-info mx-1">Permissions</a>
        <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>
    </div> --}}

   <div class="col-12 mt-3">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>
                        Roles
                        <?php if(auth()->guard('admin')->user()->can('permission-create')){?>
                            <a href="{{ url('roles/create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus text-inverse m-r-10"></i> Add Role</a>
                        <?php   }?>

                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-outline-warning">
                                            <i class="fa fa-plus text-inverse m-r-10"></i> / <i class="fa fa-pencil text-inverse m-r-10"></i>  Role Permission
                                        </a>
                                         <?php if(auth()->guard('admin')->user()->can('role-update')){?>
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <?php   }?>

                                        <?php if(auth()->guard('admin')->user()->can('role-delete')){?>
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-outline-danger" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                        <?php   }?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



