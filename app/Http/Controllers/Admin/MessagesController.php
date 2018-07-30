<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

    public function directcommunication(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Message::where("category",1)->get();
        return view('admin.notificationDirectCommunication', ["items"=>$items]);

    }

    public function window(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Message::where("category",3)->get();
        return view('admin.notificationsWindow', ["items"=>$items]);

    }

    public function goinvest(){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $items = Message::where("category",2)->get();
        return view('admin.notificationGoInvest', ["items"=>$items]);

    }

    public function search(Request $request){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        $keyword = '"%'.$request->input("searchNotification").'%"';
        $result = [];
        if (strlen($keyword)>2){

            $result = DB::table('messages')
                ->where('data->name', "LIKE",$keyword)->orWhere('data->from', "LIKE",$keyword)->orWhere('data->text', "LIKE",$keyword)
                ->get();
        }

        return view('admin.notificationSearch', ["result"=>$result , "key"=>$request->input("searchNotification")]);

    }

    public function remove($id = null){
        if (!count(Auth::user())){
            return redirect("/login");
        }
        if ($id){
            Message::destroy($id);
        }
        return back();


    }
    public function checked($id){

        if (!count(Auth::user())){
            return redirect("/login");
        }
        if ($id){
            $message = Message::find($id);
            $message->checked = 1;
            $message->save();
        }
        $message = Message::where("checked",0)->first();
        $view = "";
        if(count($message)) {

            switch ($message->category) {
                case 1:
                    $view = "directcommunication";
                    break;
                case 2:
                    $view = "goinvest";
                    break;
                default:
                    $view = "window";
            }
        }
        return response($view);

    }







}
