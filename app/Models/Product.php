<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'Product-image/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory. self::$imageName;
        return self::$imageUrl;
    }
    public static function newProduct($request)
    {
        self::$product = new Product();

        self::$product->product_name                    = $request->product_name;
        self::$product->product_stock                   = $request->product_stock;
        self::$product->product_description             = $request->product_description;
        self::$product->product_price                   = $request->product_price;
        self::$product->image                           = self::getImageUrl($request->file('image'));
        self::$product->save();
    }
    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($request->id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image));
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else {
            self::$imageUrl = self::$product->image;
        }
        self::$product->product_name                    = $request->product_name;
        self::$product->product_stock                   = $request->product_stock;
        self::$product->product_description             = $request->product_description;
        self::$product->product_price                   = $request->product_price;
        self::$product->image                           = self::$imageUrl;
        self::$product->save();
    }
    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

}
