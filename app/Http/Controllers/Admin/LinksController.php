<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{

    public function index(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Link::all();
        return view('admin.settingUsefulLinks', ['items' => $items]);

    }

    public function remove($id = null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        if ($id){
            Link::destroy($id);
        }
        return back();

    }

    public function add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $newItem = new Link();

        $newItem->title = $request->input("siteNameLink");
        $newItem->link = $request->input("siteAdressLink");

        $images = $request->prewLink;
        if (count($images)) {
            $pref = rand(1, 10000);
            $name = $pref .$images->getClientOriginalName();
            $images->move(public_path() . '/images/icons/', $name);
            $newItem->img = "/public/images/icons/" . $name;
        }
        else{
            $newItem->img ="/public/images/empty.png";

        }
        $newItem->save();

        return back();
    }





}
