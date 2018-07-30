<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media_New extends Model
{
    public static function index($count=0)
    {

        $news = Media_New::where('published_main',1)->orderBy('id', 'DESC');
        $news = ($count) ?
            $news->take($count)->get() : $news->get();
        return $news;
    }
    public static function getItemMedia($id=0)
    {

        $news = Media_New::where('id_news',$id)->orderBy('created_at', 'DESC')->get();
        return $news;
    }

    public static function addItemMedia($id=0)
    {

        $news = Media_New::where('id_news',$id)->orderBy('created_at', 'DESC')->get();
        return $news;
    }
}
