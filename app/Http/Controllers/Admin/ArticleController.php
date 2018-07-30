<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Article;
use App\Menu;
use App\Media_Article;
use App\Media_Articledoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{


    public function add($id = null, Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $newItem = new Article();
        if ($id){
            $newItem = Article::find($id);
        }
        $newItem->title = $request->input("addArticleCaption");
        $newItem->description = ($request->input("area2"))? $request->input("area2") : "";

        if ($request->input('addArticlesSelect2')){
            $newItem->cat_id = $request->input('addArticlesSelect2');
        }
        else if($request->input('addArticlesSelect3')) {
            $newItem->cat_id = $request->input('addArticlesSelect3');
        }
        else if($request->input('addArticlesSelect4')) {
            $newItem->cat_id = $request->input('addArticlesSelect4');
        }
        else if($request->input('addArticlesSelect5')) {
            $newItem->cat_id = $request->input('addArticlesSelect5');
        }
        else{
            $newItem->cat_id = $request->input('addArticlesSelect1');
        }

        $images = $request->prewImgNews;

        if (count($images)) {
            $firstImg = array_shift($images);
            $pref = rand(1, 10000);
            $name = $pref .$firstImg->getClientOriginalName();
            $firstImg->move(public_path() . '/images/news/', $name);
            $newItem->img = "/public/images/news/" . $name;
            $newItem->save();
            $newMedia = new Media_Article();
            $newMedia->img = $newItem->img;
            $newMedia->id_article = $newItem->id;
            $newMedia->save();
            foreach ($images as $f) {
                $pref = rand(1, 10000);
                $name = $pref . $f->getClientOriginalName();
                $f->move(public_path() . '/images/news/', $name);
                $newMedia = new Media_Article();
                $newMedia->img = "/public/images/news/" . $name;
                $newMedia->id_article = $newItem->id;
                $newMedia->save();
            }
        }
        else{
            if (!$id){
                $newItem->img ="/public/images/empty.png";

            }
            $newItem->save();
        }

        $docs = $request->prewDocsNews;

        if (count($docs)) {
            foreach ($docs as $f) {
                $pref = md5(uniqid(rand(),1));
                $ex = $f->extension($f->getClientOriginalName());
                $name = $pref.".".$ex;
                $f->move(public_path() . '/docs/', $name);
                $newMedia = new Media_Articledoc();
                $newMedia->link = "/public/docs/" . $name;
                $newMedia->id_article = $newItem->id;
                $newMedia->title =  $f->getClientOriginalName();
                $newMedia->save();
            }
        }
        return back();
    }

    public function edit($id=null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $item = new Article();
        $media = new Media_Article();
        $docs = new Media_Articledoc();
        $menu = Menu::main();
        $parrent_cat = 0;
        $word = "Добавление";
        if ($id){
            $item = Article::getItemOne($id);
            $media = Media_Article::index($id);
            $docs = Media_Articledoc::index($id);
            if ($item->cat_id !=0){
                $parrent_cat = Menu::find($item->cat_id)->parrent_id;
            }
            else {
                $cat = [];
                $right = Menu::main();
            }
            $word = "Редактирование";
        }

        return view('admin.addArticles', ['word'=> $word,'item' => $item, 'menu'=>$menu,'media'=>$media, 'docs'=>$docs, 'cat'=>$item->cat_id, "parrent_cat"=>$parrent_cat]);
    }
    public function change(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Article::paginate(20);
        return view('admin.editArticles', ['items' => $items]);
    }
    public function removeD($id){
        Media_Articledoc::destroy($id);
        return back();
    }

    public function remove($id){

        $docs = Media_Articledoc::where("id_article",$id)->get();
        foreach ($docs as $d){
            unlink($_SERVER['DOCUMENT_ROOT'].$d->link);
            $d->delete();
        }
        $media = Media_Article::where("id_article",$id)->get();
        foreach ($media as $d){
            $d->delete();
        }
        Article::destroy($id);
        return back();
    }
    public function search(Request $request){
        $key = $request->input("search");
        if (strlen($key)<2){
            return back();
        }

        $pages = Article::where("title","LIKE", '%'.$key.'%')->orWhere("description","LIKE", '%'.$key.'%')->paginate(20);


        return view('admin.editArticles', ['items' => $pages , 'search' => $key]);

    }

    public function remImg($id){
        $img = Media_Article::find($id);
        unlink($_SERVER['DOCUMENT_ROOT'].$img->img);
        Media_Article::destroy($id);
        return back();
    }
}
