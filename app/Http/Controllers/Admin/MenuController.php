<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Menu;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{

    public function index(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Menu::main();
        foreach ($items as $item){
            $item->parrent_title = (count(Menu::where("id",$item->parrent_id)->first()))? Menu::where("id",$item->parrent_id)->first()->title : "";
            foreach ($item["items"] as $i){
                $i->parrent_title = (count(Menu::where("id",$i->parrent_id)->first()))? Menu::where("id",$i->parrent_id)->first()->title : "";
            }
        }
        return view('admin.settingMenu', ['items' => $items]);

    }

    public function remove(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $sel1 = $request->input("menuSelectRemove1");
        $sel2 = $request->input("menuSelectRemove2");
        if ($sel2 != 0) {

            $items = Article::where("cat_id",$sel2)->get();
            foreach ($items as $item) {
                $item->cat_id = 0;
                $item->save();
            }
            Menu::destroy($sel2);
        }
        else{
            $items = Menu::getItemByParrent($sel1);
            foreach ($items as $item) {
                $articles = Article::where("cat_id",$item->id)->get();
                foreach ($articles as $article) {
                    $article->cat_id = 0;
                    $article->save();
                }
                $item->delete();
            }
            $articles = Article::where("cat_id",$sel1)->get();
            foreach ($articles as $article) {
                $article->cat_id = 0;
                $article->save();
            }
            Menu::destroy($sel1);
        }
        return back();

    }

    public function add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $newItem = new Menu();
        $sel1 = $request->input("menuSelect1");
        $newItem->parrent_id = $sel1;
        $newItem->title = $request->input("siteNameLink");
        $newItem->title_en = $request->input("siteNameLinkEn");
        $newItem->priority = Menu::where("parrent_id",$sel1)->count()+1;
        $newItem->save();
        if ($request->input("typeMenu") == 1){
            $newItem->type = 1;
            $newItem->link = "/articles/".$newItem->id;
        }
        else if($request->input("typeMenu") == 2)
        {
            $newItem->type = 2;
            $newItem->link = "/page/";
        }
        else if ($request->input("typeMenu") == 3)
        {
            $newItem->type = 3;
            $newItem->link = $request->input("link");
        }
        else{
            $newItem->type = 4;
            $newItem->link = "/projects/".$newItem->id;
        }



        $newItem->save();

        return back();
    }


    public function edit(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Menu::all();
        foreach ($items as $item) {
            $id = $item->id;
            $item->title = $request->input("t" . $id);

            if ($request->input("type" . $id) != $item->type){
                if ($request->input("type" . $id) == 4) {
                    $item->link = "/projects/" . $item->id;
                } else if ($request->input("type" . $id) == 1) {
                    $item->link = "/articles/" . $item->id;
                } else if ($request->input("type" . $id) == 2) {
                    $item->link = "/page/";
                } else {
                    $item->link = $request->input("l" . $id);
                }
                $item->type = $request->input("type" . $id);
            }
            elseif($item->type == 3){
                $item->link = $request->input("l" . $id);
            }

            $item->title_en = ($request->input("te".$id))?$request->input("te".$id) : "" ;

            $item->parrent_id = $request->input("par".$id);
            $item->priority = $request->input("p".$id);
            $item->save();
        }



        return back();
    }

}
