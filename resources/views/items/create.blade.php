<h1>商品登録</h1>

<form action="/items" method="POST">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>価格</label>
        <input type="text" name="price">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>