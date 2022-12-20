@extends('backend.master')
@section('title')
    View/Manage Role
@endsection

@section('body')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">  View/Manage Role</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">  View/Manage Role</li>
                </ol>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-title">  View/Manage Role</div>
                            <div class="card-body">
                                <table class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role  </th>
                                        <th>  User</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $role->role_name }}</td>
                                            <td>{{ $role->user_name }}</td>
                                            <td>{{ $role->email }}</td>
                                            <td>
                                                <a href="{{ route('role.delete',[$role->role_id]) }}" class="btn btn-danger btn-sm me-1" onclick="return confirm('do you want to delete Role?')">Delete</a>
                                                <a href="{{ route('role.edit',['id'=>$role->user_id,$role->role_id]) }}" class="btn btn-success btn-sm me-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
@endsection

