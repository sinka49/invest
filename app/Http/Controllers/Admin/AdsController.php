<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{

    public function index(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Ad::all();
        return view('admin.settingAd', ["items"=>$items]);

    }

    public function add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $poll = new Ad();
        $poll->title = $request->input("title");
        $poll->text = $request->input("text");
        $poll->save();
        return back();

    }


    public function remove($id = null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        if ($id){
            Ad::destroy($id);
        }
        return back();

    }







}
