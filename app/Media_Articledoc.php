<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media_Articledoc extends Model
{
    public static function index($id=1)
    {

        $media = Media_Articledoc::where('id_article',$id)->orderBy('created_at', 'DESC')->get();
        return $media;
    }
    public static function getItemMedia($id=0)
    {

        $news = Media_Article::where('id_news',$id)->orderBy('created_at', 'DESC')->get();
        return $news;
    }
}
