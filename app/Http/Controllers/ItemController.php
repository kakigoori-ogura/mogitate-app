<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    public function create()
{
    return view('items.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|integer|min:0',
    ]);

    Item::create([
        'name' => $request->name,
        'price' => $request->price,
    ]);

    return redirect('/');
}
}
