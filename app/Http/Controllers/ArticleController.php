<?php


namespace App\Http\Controllers;

use App;
use App\Article;
use App\Menu;
use App\Media_Article;
use App\Media_Articledoc;
use App\Link;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ArticleController extends Controller
{
    protected $menu;
    protected $rightmenu;
    protected $linkItems;
    protected $local;
    public function __construct()
    {
        $items = Menu::main();
        $this->menu = $items;
        $this->linkItems = Link::all();
        $this->local =  LaravelLocalization::getCurrentLocale();
    }

    public function index($id)
    {
        $items = Article::getItem($id);
        $cat = Menu::find($id);
        $right = Menu::main($cat->parrent_id);
        $this->rightmenu = $right;
        return view('investment_project', ['local'=>$this->local, 'items' => $items, 'menu'=>$this->menu, "right"=> $this->rightmenu, "cat"=>$cat, "linkItems"=>$this->linkItems]);


    }

    public function item($id)
    {
        $item = Article::getItemOne($id);
        if ($item->cat_id !=0){
            $cat = Menu::find($item->cat_id);
            $right = Menu::main($cat->parrent_id);
        }
        else {
              $cat = [];
              $right = Menu::main();
        }

        $this->rightmenu = $right;
        $docs = Media_Articledoc::index($id);
        $media = Media_Article::index($id);
        return view('articlePage', ['local'=>$this->local, 'item' => $item, 'menu'=>$this->menu, "right"=> $this->rightmenu, 'media'=>$media, "cat"=>$cat, 'docs'=>$docs, "linkItems"=>$this->linkItems]);


    }


}
