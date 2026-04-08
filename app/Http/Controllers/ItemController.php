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

public function edit($id)
{
    $item = Item::find($id);
    return view('items.edit', compact('item'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|integer|min:0',
    ]);

    $item = Item::find($id);
    $item->update([
        'name' => $request->name,
        'price' => $request->price,
    ]);

    return redirect('/');
}
public function destroy($id)
{
    $item = Item::find($id);
    $item->delete();

    return redirect('/');
}
public function store(Request $request)
{
    // バリデーション
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0|max:10000',
        'image' => 'required|image|mimes:png,jpeg',
        'season' => 'required',
        'description' => 'required|max:120',
    ], [
        'name.required' => '商品名を入力してください',

        'price.required' => '値段を入力してください',
        'price.numeric' => '数値で入力してください',
        'price.min' => '0〜10000円以内で入力してください',
        'price.max' => '0〜10000円以内で入力してください',

        'image.required' => '画像を登録してください',
        'image.image' => '画像ファイルをアップロードしてください',
        'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',

        'season.required' => '季節を選択してください',

        'description.required' => '商品説明を入力してください',
        'description.max' => '120文字以内で入力してください',
    ]);
    // 画像保存
    $path = $request->file('image')->store('images', 'public');

    // DB保存
    \App\Models\Item::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $path,
        'season' => $request->season,
        'description' => $request->description,
    ]);

    // リダイレクト
    return redirect('/');
}
}
