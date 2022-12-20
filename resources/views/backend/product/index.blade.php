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
                                <form action=" {{ route('product.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="product_name" class="col-md-3">Product Name:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_stock" class="col-md-3">Product Stock:</label>
                                        <div class="col-md-9">
                                            <input type="number" name="product_stock" id="product_stock" class="form-control" placeholder="Enter Product stock" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-3">Product Description:</label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="description" name="product_description" class="form-control" placeholder="Enter product description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="product_price" class="col-md-3">Product Price:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image" class="col-md-3">Product Image:</label>
                                        <div class="col-md-9">
                                            <input type="file" name="image"  class="form-control" id="image" placeholder="Upload Image" height="300px" width="600px" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="submit"  class="btn btn-primary px-5"  value="Product Add" />
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
