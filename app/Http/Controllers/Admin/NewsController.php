<?php

namespace App\Http\Controllers\Admin;

use App;
use App\News;
use App\Media_New;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{


    public function __construct()
    {

    }

    public function add( $id = null,Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $newItem = new News();

        if ($id){
            $newItem = News::find($id);

        }
        $newItem->title = $request->input("addNewsCaption");
        $newItem->content = ($request->input("area2"))? $request->input("area2") : "";
        $newItem->published = ($request->input("published"))? 1:0;
        $newItem->created_at = ($request->input("date"))? $request->input("date"): date("Y-m-d H:i:s");
        $images = $request->prewImgNews;

        if (count($images)) {
            $firstImg = array_shift($images);
            $pref = rand(1, 10000);
            $name = $pref .$firstImg->getClientOriginalName();
            $firstImg->move(public_path() . '/images/news/', $name);
            $newItem->img = "/public/images/news/" . $name;
            $newItem->save();
            $newMedia = new Media_New();
            $newMedia->img = $newItem->img;
            $newMedia->id_news = $newItem->id;
            $newMedia->published_main = 0;
            $newMedia->save();
            foreach ($images as $f) {
                    $pref = rand(1, 10000);
                    $name = $pref . $f->getClientOriginalName();
                    $f->move(public_path() . '/images/news/', $name);
                    $newMedia = new Media_New();
                    $newMedia->img = "/public/images/news/" . $name;
                    $newMedia->id_news = $newItem->id;
                    $newMedia->published_main = 1;
                    $newMedia->save();
            }
        }
        else{
            if (!$id){
                $newItem->img ="/public/images/empty.png";

            }
            $newItem->save();

        }
        return back();
    }

    public function edit($id=null){
        if (!count(Auth::user())){
           return redirect("/login");
        }
        $word = "Добавление";
        $itemNew = new News();
        $media = new Media_New();
        if ($id){
            $word = "Редактирование";
            $itemNew = News::getItem($id);
            $media = Media_New::getItemMedia($id);
        }

        return view('admin.add', ['word'=> $word,'item' => $itemNew, 'media'=>$media]);
    }


    public function change($id=null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = News::orderBy("created_at", "desc")->paginate(20);
        return view('admin.editNews', ['items' => $items]);
    }

    public function remove($id){


        $media = Media_New::where("id_news",$id)->get();
        foreach ($media as $d){
            $d->delete();
        }
        News::destroy($id);
        return back();
    }
    public function search(Request $request){
        $key = $request->input("search");
        if (strlen($key)<2){
            return back();
        }

        $pages = News::where("title","LIKE", '%'.$key.'%')->orWhere("content","LIKE", '%'.$key.'%')->paginate(20);


        return view('admin.editNews', ['items' => $pages , 'search' => $key]);

    }

    public function remImg($id){
        $img = Media_New::find($id);
        unlink($_SERVER['DOCUMENT_ROOT'].$img->img);
        Media_New::destroy($id);
        return back();
    }
}
