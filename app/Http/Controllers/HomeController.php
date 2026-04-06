<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $swords = [
            (object)['title'=>'Katana','description'=>'A sharp Japanese sword.','type'=>'Katana'],
            (object)['title'=>'Claymore','description'=>'A huge two-handed sword from Scotland.','type'=>'Claymore'],
            (object)['title'=>'Bastard Sword','description'=>'Versatile one- or two-handed sword.','type'=>'Bastard Sword'],
        ];

        return view('home', compact('swords'));
    }
}