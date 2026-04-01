<h1>商品一覧</h1>

<ul>
    @foreach ($items as $item)
        <li>{{ $item->name }}：{{ $item->price }}円</li>
    @endforeach
</ul>