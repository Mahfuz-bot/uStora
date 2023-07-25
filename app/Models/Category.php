<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;

    public static function imageProcessing($request)
    {
        $image = $request->file('cimage');
        $imageName = $image->getClientOriginalName();
        $directory = 'category-image/';
        $image->move($directory, $imageName);
        return $directory . $imageName;
    }

    public static function saveCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->cname;
        self::$category->image = self::imageProcessing($request);
        self::$category->save();
    }


    public static function updateCategory($request, $cid)
    {
        self::$category = self::find($cid);
        if ($request->file('cimage')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::imageProcessing($request);
        }
        self::$category->name = $request->cname;
        self::$category->status = $request->cstatus;
        self::$category->save();
    }
}
