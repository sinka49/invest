<?php


namespace App\Http\Controllers\Admin;

use App;
use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

    public function index()
    {
       $items = Mail::all();
       return view('admin.mails', ['items' => $items]);

    }
    public function send( Request $request)
    {
        return back();
    }

}
