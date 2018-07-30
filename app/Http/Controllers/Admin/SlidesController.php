<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings_slide;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use App\Media_New;

class SlidesController extends Controller
{

    public function index($id=null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Slide::where("enable",1)->get();
        $slide = new Slide();
        if ($id){
            $slide = Slide::find($id);
        }
        return view('admin.media', ['slide'=>$slide, 'items' => $items]);

    }

    public function indexChange($id=null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Slide::where("enable",1)->get();
        $slide = new Slide();
        if ($id){
            $slide = Slide::find($id);
        }
        return view('admin.mediaRed', ['slide'=>$slide, 'items' => $items]);

    }
    public function slideChange(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $slide1 = Settings_slide::find(1);
        $slide2 = Settings_slide::find(2);
        return view('admin.settingSlider', ['slide1'=>$slide1, 'slide2'=>$slide2]);

    }
    public function slide1Add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $arrayVals = [];
        for ($i = 1; $i<4; $i++){
            $array = [];
            $id = "addParam".$i;
            $array["title"] = $request->input($id);
            $id = "addParamVal".$i;
            $array["val"] = $request->input($id);
            $id = "addParamValText".$i;
            $array["valText"] = $request->input($id);
            $arrayVals[count($arrayVals)] = $array;
        }

        $item =  Settings_slide::find(1);
        $images = $request->prewImgSlide1;
        dump($images);
        if (count($images)) {
            $pref = rand(1, 10000);
            $name = $pref .$images->getClientOriginalName();
            $images->move(public_path() . '/images/', $name);
            $item->link = "/public/images/" . $name;
        }
        $item->params = json_encode($arrayVals);
        $item->visible = $request->input("view1");
        $item->save();
        return back();

    }

    public function slide2Add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }


        $array = [];
        $array["title"] = $request->input("addnameMer");
        $array["val"] = $request->input("textgovno");

        $item =  Settings_slide::find(2);
        $item->params = json_encode($array);
        $images = $request->prewImgMer;
        if (count($images)) {
            $pref = rand(1, 10000);
            $name = $pref .$images->getClientOriginalName();
            $images->move(public_path() . '/images/', $name);
            $item->link = "/public/images/" . $name;
        }
        $item->visible = $request->input("view2");
        $item->save();
        return back();

    }
    public function redMenu(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $params = [];
        $array = [];
        $array["title"] = $request->input("tit1");
        $array["val"] = $request->input("link1");
        $params[] = $array;
        $array["title"] = $request->input("tit2");
        $array["val"] = $request->input("link2");
        $params[] = $array;
        $array["title"] = $request->input("tit3");
        $array["val"] = $request->input("link3");
        $params[] = $array;
        $item =  Settings_slide::find(3);
        $item->params = json_encode($params);
        $item->visible = 1;
        $item->save();
        return back();

    }
    public function mainSlider(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $newsMedia = Media_New::take(30)->orderBy('id', 'DESC')->get();

        return view('admin.settingMediaSlider', ['images'=>$newsMedia]);

    }

    public function setSlider(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        for ($i = 1; $i < 31; $i++){

            $id = $i."id";
            $it = $request->input($id);
            $item = Media_New::find($it);

            $id = $i."ch";
            if (count($item)) {
                if ($request->input($id)) {
                    $item->published_main = 1;
                } else {
                    $item->published_main = 0;
                }
                $item->save();
            }
        }

        return back();

    }

    public function remove(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $id = $request->input("slides");
        if ($id){
            Slide::destroy($id);
        }
        return back();

    }

    public function add($id = null, Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $newItem = new Slide();
        if($request->input("id")){
            $id = $request->input("id");
            $newItem = Slide::find($id);
            $img = $newItem->img;
        }

        $newItem->title = $request->input("title");
        $newItem->content = $request->input("area");

        $images = $request->file;
        if (count($images)) {
            $pref = rand(1, 10000);
            $name = $pref .$images->getClientOriginalName();
            $images->move(public_path() . '/images/', $name);
            $newItem->img = "/public/images/" . $name;
        }
        else{
            if (!$id){
                $newItem->img ="/public/images/empty.png";
            }
            else{
                $newItem->img = $img;
            }

        }
        $newItem->save();

        return back();
    }





}
