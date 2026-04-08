<h1>{{ $item->name }}</h1>

<img src="{{ asset('storage/' . $item->image) }}" width="200">

<p>価格：{{ $item->price }}円</p>
<p>季節：{{ $item->season }}</p>
<p>説明：{{ $item->description }}</p>

<a href="/">一覧に戻る</a>