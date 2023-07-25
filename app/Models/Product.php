<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product;


    public static function imageProcessing($request)
    {
        $image = $request->file('pimage');
        $imageName = $image->getClientOriginalName();
        $dir = 'product-image/';
        $image->move($dir, $imageName);
        return $dir . $imageName;
    }

    public static function saveProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->categoryId;
        self::$product->brand_id = $request->brandId;
        self::$product->name = $request->pname;
        self::$product->price = $request->pprice;
        self::$product->image = self::imageProcessing($request);
        self::$product->save();
    }
    public static function updateCategory($request, $pid)
    {
        self::$product = Product::find($pid);
        if ($request->file('pimage')) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = self::imageProcessing($request);
        }
        self::$product->category_id = $request->categoryId;
        self::$product->brand_id = $request->brandId;
        self::$product->name = $request->pname;
        self::$product->price = $request->pprice;
        self::$product->status = $request->pstatus;
        self::$product->save();
    }
}
