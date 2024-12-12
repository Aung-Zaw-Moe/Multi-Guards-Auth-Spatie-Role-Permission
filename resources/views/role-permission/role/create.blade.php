@extends('admin.main')
@section('content')

 <div class="col-12 mt-3">
        <div class="card">

                @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Create Role
                            <a href="{{ url('roles') }}" class="btn btn-outline-danger float-right"><i class="fa fa-close text-inverse m-r-10"></i> Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('roles') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

   

