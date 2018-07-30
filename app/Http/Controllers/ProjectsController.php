<?php

namespace App\Http\Controllers;

use App;
use App\Project;
use App\Media_Project;
use App\Menu;
use Illuminate\Http\Request;
use App\Link;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProjectsController extends Controller
{
    protected $menu;
    protected $linkItems;
    protected $local;
    protected $rightmenu;
    public function __construct()
    {
        $items = Menu::main();
        $this->menu = $items;
        $this->linkItems = Link::all();
        $this->local =  LaravelLocalization::getCurrentLocale();
    }

    public function index($id){
        $items = Project::getItem($id);
        $cat = Menu::find($id);
        $right = Menu::main($cat->parrent_id);
        $this->rightmenu = $right;
        return view('projects', ['local'=>$this->local, 'items' => $items, 'menu'=>$this->menu, "right"=> $this->rightmenu, "cat"=>$cat, "linkItems"=>$this->linkItems]);

    }
    public function item($id){


        $item = Project::find($id);
        if ($item->cat_id !=0){
            $cat = Menu::find($item->cat_id);
            $right = Menu::main($cat->parrent_id);
        }
        else {
            $cat = [];
            $right = Menu::main();
        }

        $this->rightmenu = $right;

        $media = Media_Project::where("project_id",$id)->get();

        return view('asd', ['local'=>$this->local, 'item' => $item, 'menu'=>$this->menu, "right"=> $this->rightmenu, 'media'=>$media, "cat"=>$cat,  "linkItems"=>$this->linkItems]);


    }

}
