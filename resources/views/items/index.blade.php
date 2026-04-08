<h1>商品一覧</h1>
<a href="/items/create">＋ 商品を追加</a>

<form method="GET" action="/">

    <input type="text" name="keyword" placeholder="商品名で検索">

    <select name="sort">
        <option value="">並び替え</option>
        <option value="asc">価格が安い順</option>
        <option value="desc">価格が高い順</option>
    </select>

    <button type="submit">検索</button>

</form>

<ul>
    @foreach ($items as $item)
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
    <img src="{{ asset('storage/' . $item->image) }}" width="150">

    <p>
    <a href="/items/{{ $item->id }}">
        {{ $item->name }}
    </a>
    </p>
    <p>{{ $item->price }}円</p>


    <a href="/items/{{ $item->id }}/edit">編集</a>

    <form action="/items/{{ $item->id }}/delete" method="POST" style="width:200px; display:inline-block; vertical-align:top;">
        @csrf
        <button type="submit">削除</button>
    </form>
</div>
    @endforeach
</ul>