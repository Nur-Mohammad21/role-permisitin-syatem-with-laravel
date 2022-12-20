@extends('backend.master')
@section('title')
    Users
@endsection

@section('body')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-title">
                                <h2>Users Information</h2>
                                @if(Session::get('message')) <p class="text-success text-center">{{ Session::get('message') }}</p> @endif
                            </div>
                            <div class="card-body">
                                <form action=" {{ route('assign.role') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="role_name" class="col-md-3">Role Name:</label>
                                        <div class="col-md-9">
                                            <select name="role" id="role_name" class="form-control">
                                                <option value="">Select Role</option>
                                                @foreach($role as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="user_name" class="col-md-3">Users Name:</label>
                                        <div class="col-md-9">
                                            <select name="user_id" id="user_name" class="form-control">
                                                <option value="">Select Role</option>
                                                @foreach($users as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="submit"  class="btn btn-primary px-5"  value="Assign Role" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
