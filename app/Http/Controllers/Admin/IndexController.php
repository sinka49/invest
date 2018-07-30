<?php


namespace App\Http\Controllers\Admin;

use App;
use App\News;
use App\Media_New;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    protected $menu;

    public function __construct()
    {
        //$items = Menu::main();
       // $this->menu = $items;
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");

    }
    public function login()
    {
        return redirect("/login");
    }

    public function index()
    {
        $news = News::main();
        $newsMedia = Media_New::index();
        return view('index', ['news' => $news, 'media'=> $newsMedia, 'menu'=>$this->menu]);


    }

    public function project()
    {
        $newsMedia = Media_New::index();
        return view('project', ['media'=> $newsMedia, 'menu'=>$this->menu]);


    }

    public function article()
    {
        $newsMedia = Media_New::index();
        return view('article', ['media'=> $newsMedia, 'menu'=>$this->menu]);

    }
}
