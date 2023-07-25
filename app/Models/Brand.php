<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand;

    public static function imageProcessing($request)
    {
        $image = $request->file('bimage');
        $imageName = $image->getClientOriginalName();
        $dir = 'brand-image/';
        $image->move($dir, $imageName);
        return $dir . $imageName;
    }

    public static function saveBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->bname;
        self::$brand->image = self::imageProcessing($request);
        self::$brand->save();
    }
    public static function updateBrand($request, $bid)
    {
        self::$brand = Brand::find($bid);
        if ($request->file('bimage')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::imageProcessing($request);
        }
        self::$brand->name = $request->bname;
        self::$brand->status = $request->bstatus;
        self::$brand->save();
    }
}
