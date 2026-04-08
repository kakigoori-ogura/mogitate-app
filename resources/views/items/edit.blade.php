<h1>商品編集</h1>

<form action="/items/{{ $item->id }}" method="POST">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name" value="{{ $item->name }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>価格</label>
        <input type="text" name="price" value="{{ $item->price }}">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>
</form>