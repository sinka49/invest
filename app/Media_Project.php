<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Media_Project extends Model
{
    public $timestamps = false;
    public static function getItemMedia($id=0)
    {

        $news = Media_Project::where('project_id',$id)->get();
        return $news;
    }
}
