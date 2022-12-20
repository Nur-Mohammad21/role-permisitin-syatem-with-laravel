@extends('backend.master')
@section('title')
    Manage Product
@endsection

@section('body')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Manage</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manage Product</li>
                </ol>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card">
                            <div class="card-title">Manage Product</div>
                            <div class="card-body">
                                <table class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>1</th>
                                        <th>Product Name</th>
                                        <th>Product Stock</th>
                                        <th>product Description</th>
                                        <th>Product price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="primary">{{$loop->iteration}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_stock}}</td>
                                            <td>{{$product->product_description}}</td>
                                            <td>{{$product->product_price}}</td>
                                            <td><img src="{{ asset($product->image) }}" width="60px" height="50px" alt=""></td>

                                            <td>
                                                <span class="btn-group">
                                                     <a href=" {{ route('product.edit',['id'=>$product->id]) }} " class="btn btn-success btn-sm me-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @role('admin')
                                                <a  href=" {{ route('product.delete',['id'=>$product->id]) }} " class="btn btn-danger btn-sm me-1" onclick="return confirm('do you want to delete product?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                @endrole
                                                </span>
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

