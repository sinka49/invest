<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class News extends Model
{
    public static function index($count)
    {
        $news = News::where('published',1)->orderBy('created_at', 'DESC')->take($count)->get();

        return $news;
    }
    public static function main()
    {
        $news = News::orderBy('updated_at', 'desc')->where("published","1")->limit(10)->get();

        return $news;
    }


    public static function getItem($id)
    {
        $newItem = News::where('id', $id)->first();

        return $newItem;
    }
    public static function getItemsPage($count = 6)
    {
        $news = News::where('published',1)->orderBy('created_at', 'DESC')->paginate($count);
        return $news;
    }

}
