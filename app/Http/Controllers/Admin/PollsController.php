<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;
use Illuminate\Support\Facades\Auth;

class PollsController extends Controller
{

    public function index(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Poll::all();

        foreach ($items as $item) {
            $data = json_decode($item->data);
            $count = Answer::where("poll_id", $item->id)->count();
            $result = [];
            foreach ($data as $d) {
                $temp = $d;
                $ans = Answer::where("value", $d)->where("poll_id", $item->id)->count();
                if ($ans > 0) {
                    $res = round($ans * 100 / $count);
                } else {
                    $res = 0;
                }
                $result[] = ["title" => $temp, "res" => $res];
            }
            $item->items = $result;
        }
        return view('admin.settingOpros', ["items"=>$items]);

    }

    public function add(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }

        $poll = new Poll();
        $poll->title = $request->input("addOpros");
        $data = [];
        for ($i=1; $i<=$request->input("kolichestvo");$i++){
            $id = "addOprosCaption".$i;
            $data[] = $request->input($id) ;
        }
        $poll->data = json_encode($data);
        $poll->save();
        return back();

    }


    public function remove($id = null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        if ($id){
            Poll::destroy($id);
        }
        return back();

    }







}
