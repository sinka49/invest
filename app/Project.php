<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Project extends Model
{
    public static function getItem($id=0)
    {
        if ($id == 0)
            $items = Project::orderBy("id", "desc")->paginate(6);
        else
            $items = Project::where("cat_id", $id)->orderBy("id", "desc")->paginate(6);

        return $items;
    }

}
