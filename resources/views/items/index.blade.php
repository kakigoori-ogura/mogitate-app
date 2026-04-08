<h1>商品一覧</h1>

<ul>
    @foreach ($items as $item)
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
    <img src="{{ asset('storage/' . $item->image) }}" width="150">

    <p>{{ $item->name }}</p>
    <p>{{ $item->price }}円</p>
    <p>季節：{{ $item->season }}</p>
    <p>説明：{{ $item->description }}</p>

    <a href="/items/{{ $item->id }}/edit">編集</a>

    <form action="/items/{{ $item->id }}/delete" method="POST" style="width:200px; display:inline-block; vertical-align:top;">
        @csrf
        <button type="submit">削除</button>
    </form>
</div>
    @endforeach
</ul>