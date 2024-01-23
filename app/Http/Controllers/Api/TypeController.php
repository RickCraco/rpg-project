<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all()->load('characters');
        return response()->json($types);
    }

    public function show(Type $type){
        return response()->json($type->load('characters'));
    }
}
