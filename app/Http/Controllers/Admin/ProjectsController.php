<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Project;
use App\Media_Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Menu;
class ProjectsController extends Controller
{


    public function __construct()
    {

    }

    public function add( $id = null,Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $newItem = new Project();
        if ($id){
            $newItem = Project::find($id);
            $img = $newItem->img;
        }
        $newItem->title = $request->input("addProjectsCaption");
        $newItem->price = $request->input("addProjectsPrice");

        $count = $request->input("count");
        $desc = [];
        for ($i = 1; $i<= $count; $i++){
            $id = "addProjectsC".$i;
            $title = $request->input($id);
            $id = "addProjArea".$i;
            $d = $request->input($id);
            $desc[] = ["title"=>$title, 'd'=>$d];
        }
        $newItem->description = json_encode($desc);
        if ($request->input('addPages2')){
            $newItem->cat_id = $request->input('addPages2');
        }
        else if($request->input('addPages3')) {
            $newItem->cat_id = $request->input('addPages3');
        }
        else if($request->input('addPages4')) {
            $newItem->cat_id = $request->input('addPages3');
        }
        else if($request->input('addPages5')) {
            $newItem->cat_id = $request->input('addPages3');
        }
        else{
            $newItem->cat_id = $request->input('addPages1');
        }
        $images = $request->prewImgProjects;
        if (count($images)) {
            $firstImg = array_shift($images);
            $pref = rand(1, 10000);
            $name = $pref .$firstImg->getClientOriginalName();
            $firstImg->move(public_path() . '/images/news/', $name);
            $newItem->img = "/public/images/news/" . $name;
            $newItem->save();
            $newMedia = new Media_Project();
            $newMedia->img = $newItem->img;
            $newMedia->project_id = $newItem->id;
            $newMedia->save();
            foreach ($images as $f) {
                    $pref = rand(1, 10000);
                    $name = $pref . $f->getClientOriginalName();
                    $f->move(public_path() . '/images/news/', $name);
                    $newMedia = new Media_Project();
                    $newMedia->img = "/public/images/news/" . $name;
                    $newMedia->project_id = $newItem->id;
                    $newMedia->save();
            }
        }
        else{
            if (!$id){
                $newItem->img ="/public/images/empty.png";

            }
            else{
                $newItem->img = $img;
            }

            $newItem->save();
        }
        return back();
    }

    public function edit($id=null){
        if (!count(Auth::user())){
           return redirect("/login");
        }
        $menu = Menu::mainType(0,4);
        $cat = 0;
        $parrent_cat = 0;
        $itemNew = new Project();
        $media = new Media_Project();
        $word = "Добавление";
        if ($id){
            $itemNew = Project::find($id);
            $media = Media_Project::getItemMedia($id);
            $word = "Редактирование";
        }
        if ($itemNew->cat_id !=0){
            $parrent_cat = (count(Menu::find($itemNew->cat_id)))? Menu::find($itemNew->cat_id)->parrent_id : 0;
            $cat = $itemNew->cat_id;
        }
        return view('admin.addProject', ['word'=> $word, 'item' => $itemNew, 'media'=>$media, 'parrent_cat'=>$parrent_cat, 'cat'=>$cat, 'menu'=>$menu]);
    }

    public function change($id=null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Project::orderBy("id", "desc")->paginate(20);
        return view('admin.editp', ['items' => $items]);
    }

    public function remove($id){

        $media = Media_Project::getItemMedia($id);
        foreach ($media as $d){
            $d->delete();
        }
        Project::destroy($id);
        return back();
    }
    public function search(Request $request){
        $key = $request->input("search");
        if (strlen($key)<2){
            return back();
        }

        $pages = Project::where("title","LIKE", '%'.$key.'%')->paginate(20);


        return view('admin.editp', ['items' => $pages , 'search' => $key]);

    }

    public function remImg($id){
        $img = Media_Project::find($id);
        unlink($_SERVER['DOCUMENT_ROOT'].$img->img);
        Media_Project::destroy($id);
        return back();
    }
}
