<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use Yangqi\Htmldom\Htmldom;

class ParserController extends Controller
{
    public function index()
    {
        $arrayNews = [];
        $html = new Htmldom('http://mkala.ru/info/news/');
        $i = 0;
        foreach($html->find('.mymarginbottom5') as $element){
            ($i < 5)?
                 $arrayNews[$i]["img"] = "http://mkala.ru/".$element->src : false;
                 $i++;
        }

        $i = 0;
        foreach($html->find('h7.media-heading a') as $element){
             if($i < 5) {
                 $arrayNews[$i]["href"] = $element->href;
                 $arrayNews[$i]["title"] = $element->plaintext;
             }
             else false;
                $i++;
        }
        $i = 0;
        foreach($html->find('.mymarginbottom5 ~ small span') as $element){
             ($i < 5)?
                $arrayNews[$i]["date"] = $element->plaintext: false;
                $i++;
        }

        return view('parser', ['parseData' => $arrayNews]);


    }
}
