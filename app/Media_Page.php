<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media_Page extends Model
{
    public static function index($id=1)
    {

        $media = Media_Page::where('page_id',$id)->orderBy('created_at', 'DESC')->get();
        return $media;
    }

}
