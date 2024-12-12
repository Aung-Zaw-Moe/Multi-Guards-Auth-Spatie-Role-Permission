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
                     <h4>Users
                            <?php if(auth()->guard('admin')->user()->can('user-create')){?>
                                <a href="{{ url('users/create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus text-inverse m-r-10"></i> Add User</a>
                            <?php   }?>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                 <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>

                                        <?php if(auth()->guard('admin')->user()->can('user-update')){?>
                                             <a href="{{ url('users/'.$user->id.'/edit') }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <?php   }?>
                                        <?php if(auth()->guard('admin')->user()->can('user-delete')){?>
                                             <a href="{{ url('users/'.$user->id.'/delete') }}" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                        <?php   }?>
{{--
                                        @can('user-delete', 'admin')
                                         <a href="{{ url('users/'.$user->id.'/delete') }}" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                        @endcan --}}
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







