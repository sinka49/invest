<?php


namespace App\Http\Controllers;

use App;
use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MailController extends Controller
{

    public function add( Request $request)
    {
        $mail = Mail::where("email",$request->input("email"))->first();
        if (count($mail)){
            Session::flash("mes", "Ваш email уже добавлен для рассылки");
            return back();
        }
        $mail = new Mail();
        $mail->email = $request->input("email");
        $mail->save();
        Session::flash("mes", "Ваш email добавлен для рассылки");
        return back();
    }

}
