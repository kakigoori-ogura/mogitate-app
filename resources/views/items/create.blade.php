<h1>商品登録</h1>

<form action="/items" method="POST" enctype="multipart/form-data">
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

    <div>
        <label>画像</label>
        <input type="file" name="image">
        @error('image')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>季節</label>
        <select name="season">
            <option value="">選択してください</option>
            <option value="春">春</option>
            <option value="夏">夏</option>
            <option value="秋">秋</option>
            <option value="冬">冬</option>
        </select>
        @error('season')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>商品説明</label>
        <textarea name="description"></textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>