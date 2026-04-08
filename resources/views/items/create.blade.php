<h1>商品登録</h1>

<form action="/items" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>価格</label>
        <input type="text" name="price" value="{{ old('price') }}">
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
        <label>季節</label><br>
</div>
    <input type="checkbox" name="season[]" value="春" {{ in_array('春', old('season', [])) ? 'checked' : '' }}> 春
    <input type="checkbox" name="season[]" value="夏" {{ in_array('夏', old('season', [])) ? 'checked' : '' }}> 夏
    <input type="checkbox" name="season[]" value="秋" {{ in_array('秋', old('season', [])) ? 'checked' : '' }}> 秋
    <input type="checkbox" name="season[]" value="冬" {{ in_array('冬', old('season', [])) ? 'checked' : '' }}> 冬

    @error('season')
        <p>{{ $message }}</p>
    @enderror
</div>
    <div>
        <label>商品説明</label>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>
<a href="/">一覧に戻る</a>