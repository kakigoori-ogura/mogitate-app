<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = DB::table('items')->get();
        return view('items.index', compact('items'));
    }
}
