<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    private static $carousel;

    public static function imageProcessing($request)
    {
        $image = $request->file('crimage');
        $imageName = $image->getClientOriginalName();
        $dir = "carousel-image/";
        $image->move($dir, $imageName);
        return $dir . $imageName;
    }

    public static function saveCarousel($request)
    {
        self::$carousel = new Carousel();
        self::$carousel->offer = $request->croffer;
        self::$carousel->image = self::imageProcessing($request);
        self::$carousel->save();
    }
    public static function updateCarousel($request, $cid)
    {
        self::$carousel = Carousel::find($cid);
        if ($request->file('crimage')) {
            if (file_exists(self::$carousel->image)) {
                unlink(self::$carousel->image);
            }
            self::$carousel->image = self::imageProcessing($request);
        }
        self::$carousel->offer = $request->croffer;
        self::$carousel->status = $request->crstatus;
        self::$carousel->save();
    }
}
