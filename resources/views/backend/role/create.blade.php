@extends('backend.master')
@section('title')
    Admin Product
@endsection

@section('body')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Product</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Product</li>
                </ol>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-title">
                                <h2>Product Information</h2>
                                @if(Session::get('message')) <p class="text-success text-center">{{ Session::get('message') }}</p> @endif
                            </div>
                            <div class="card-body">
                                <form action=" {{ route('role.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="role_name" class="col-md-3">Role Name:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Enter Role name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="submit"  class="btn btn-primary px-5"  value="Add Role" />
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
