@extends('backend.master')
@section('title')
    Edit Role
@endsection
@section('body')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Role</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Role</li>
                </ol>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-title">
                                <h2>Edit Role</h2>
                                @if(Session::get('message')) <p class="text-success text-center">{{ Session::get('message') }}</p> @endif
                            </div>
                            <div class="card-body">
                                <form action=" {{ route('role.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="role_name" class="col-md-3">User Name:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="role_name" class="col-md-3">Select Role:</label>
                                        <div class="col-md-9">
                                            <select name="role" id="" class="form-control select2">
                                                <option value="">select role</option>
                                                @foreach($roles as $value)
                                                    <option value="{{ $value->name }}" @if($value->name==$currRoles->name)) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="submit"  class="btn btn-primary"  value="Update Role" />
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

