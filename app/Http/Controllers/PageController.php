<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $items = Link::all();
        return view('home', compact('items'));
    }

    public function linkInsert(Request $req){
        Link::create($req->all());
        return back();
    }
}
