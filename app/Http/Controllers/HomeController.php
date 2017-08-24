<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\Item;
class HomeController extends Controller
{
    public function index()
    {
        $item = new Item;
        $data = $item->select("itemId","itemName","Qty")->paginate(5);

        Log::info(print_r(compact('data'), true));
        //return view('myhome',['ITEM_DATA'=>$i]);
        return view('myhome',compact('data'));
    }
}