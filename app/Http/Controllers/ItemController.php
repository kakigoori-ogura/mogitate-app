<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
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
        'price' => 'required|numeric|min:0|max:10000',
        'image' => 'nullable|image|mimes:png,jpeg',
        'season' => 'required|array',
        'description' => 'required|max:120',
    ], [
        'name.required' => '商品名を入力してください',

        'price.required' => '値段を入力してください',
        'price.numeric' => '数値で入力してください',
        'price.min' => '0〜10000円以内で入力してください',
        'price.max' => '0〜10000円以内で入力してください',

        'image.image' => '画像ファイルをアップロードしてください',
        'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',

        'season.required' => '季節を選択してください',

        'description.required' => '商品説明を入力してください',
        'description.max' => '120文字以内で入力してください',
    ]);

    $item = Item::find($id);

    // 画像更新（あれば）
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $item->image = $path;
    }

    $item->update([
        'name' => $request->name,
        'price' => $request->price,
        'season' => implode(',', $request->season),
        'description' => $request->description,
    ]);

    return redirect('/items/' . $id);
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
        'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください','season.required' => '季節を選択してください',
        'season.array' => '季節を選択してください',
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
        'season' => implode(',', $request->season),
        'description' => $request->description,
    ]);

    // リダイレクト
    return redirect('/');
}
public function show($id)
{
    $item = Item::find($id);
    return view('items.show', compact('item'));
}
public function index(Request $request)
{
    $query = Item::query();

    //  検索（商品名）
    if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    //  並び替え（価格）
    if ($request->sort) {
        $query->orderBy('price', $request->sort);
    }

$items = $query->paginate(6);

    return view('items.index', compact('items'));
}
public function destroy($id)
{
    $item = Item::find($id);
    $item->delete();
    return redirect('/');
}
}
