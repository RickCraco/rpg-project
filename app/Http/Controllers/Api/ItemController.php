<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all()->load('characters');
        return response()->json($items);
    }

    public function show(Item $item){
        return response()->json($item->load('characters'));
    }
}
