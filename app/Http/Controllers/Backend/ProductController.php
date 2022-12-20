<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     private $products;
     private $product;
    public function index()
    {
        return view('backend.product.index');
    }
    public function create(Request $request)
    {
        Product::newProduct($request);
        return redirect()->back()->with('message','Product save successfully');
    }
    public function manage()
    {
        $this->products = Product::latest()->get();
        return view('backend.product.manage',['products'=>$this->products]);
    }
    public function edit($id)
    {
        $this->product = Product::find($id);
        return view('backend.product.edit',['product'=>$this->product]);
    }
    public function update(Request $request, $id)
    {
        Product::updateProduct( $request, $id);
        return redirect('/manage-product')->with('message','Product update successfully');
    }
    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect()->back()->with('message','Product delete successfully');
    }
}
