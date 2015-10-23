<?php

namespace App\Http\Controllers;

use App\Config;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    public static function GetImage($ImageName){
        $Image = Image::where('filename','=',$ImageName)->first();
        $Post=Input::get('post');
        $Config = Config::find(1);
        Header("Content-type: image/png");
        if($Image==null){
            $data=$Config->default_image_data;
            return $data;
        }
        if($Post!=$Image->post || $Image->viewed==true){
            $Image->try +=1;
            $Image->save();
            $data=$Config->default_image_data;
            return $data;
        }
        Header("Content-type: image/png");
        $data = $Image->imagedata;
        $Image->viewed=true;
        $Image->try +=1;
        $Image->save();
        return $data;
    }
    public static function SaveImage(){

    }
}
