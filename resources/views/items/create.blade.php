<div style="background-color: #f8f8f8; min-height: 100vh; font-family: 'Helvetica Neue', Arial, sans-serif; color: #333; padding-bottom: 40px;">

    <header style="background-color: #fff; padding: 10px 20px; border-bottom: 1px solid #eee; margin-bottom: 40px;">
        <h1 style="color: #f0ad4e; font-family: 'Hiragino Mincho ProN', 'serif'; font-size: 0.9rem; margin: 0;">
            mogitate
        </h1>
    </header>

    <div style="max-width: 600px; margin: 0 auto; padding: 0 20px;">
        <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 25px; color: #444; text-align: left;">商品登録</h2>

        <div style="padding: 40px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            
            <form action="/items" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-weight: bold; font-size: 0.9rem;">
                        商品名 <span style="background-color: #ff4d4f; color: white; padding: 2px 6px; border-radius: 2px; font-size: 0.7rem; margin-left: 5px; vertical-align: middle;">必須</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                    @error('name') <p style="color: #ff4d4f; font-size: 0.8rem; margin: 0;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-weight: bold; font-size: 0.9rem;">
                        価格 <span style="background-color: #ff4d4f; color: white; padding: 2px 6px; border-radius: 2px; font-size: 0.7rem; margin-left: 5px; vertical-align: middle;">必須</span>
                    </label>
                    <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                    @error('price') <p style="color: #ff4d4f; font-size: 0.8rem; margin: 0;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-weight: bold; font-size: 0.9rem;">
                        商品画像 <span style="background-color: #ff4d4f; color: white; padding: 2px 6px; border-radius: 2px; font-size: 0.7rem; margin-left: 5px; vertical-align: middle;">必須</span>
                    </label>
                    <input type="file" name="image" style="font-size: 0.9rem;">
                    @error('image') <p style="color: #ff4d4f; font-size: 0.8rem; margin: 0;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-weight: bold; font-size: 0.9rem;">
                        季節 <span style="background-color: #ff4d4f; color: white; padding: 2px 6px; border-radius: 2px; font-size: 0.7rem; margin-left: 5px; vertical-align: middle;">必須</span>
                        <span style="color: #888; font-size: 0.75rem; font-weight: normal; margin-left: 10px;">複数選択可</span>
                    </label>
                    <div style="display: flex; gap: 20px; font-size: 0.9rem;">
                        <label><input type="checkbox" name="season[]" value="春" {{ in_array('春', old('season', [])) ? 'checked' : '' }}> 春</label>
                        <label><input type="checkbox" name="season[]" value="夏" {{ in_array('夏', old('season', [])) ? 'checked' : '' }}> 夏</label>
                        <label><input type="checkbox" name="season[]" value="秋" {{ in_array('秋', old('season', [])) ? 'checked' : '' }}> 秋</label>
                        <label><input type="checkbox" name="season[]" value="冬" {{ in_array('冬', old('season', [])) ? 'checked' : '' }}> 冬</label>
                    </div>
                    @error('season') <p style="color: #ff4d4f; font-size: 0.8rem; margin: 0;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-weight: bold; font-size: 0.9rem;">
                        商品説明 <span style="background-color: #ff4d4f; color: white; padding: 2px 6px; border-radius: 2px; font-size: 0.7rem; margin-left: 5px; vertical-align: middle;">必須</span>
                    </label>
                    <textarea name="description" placeholder="商品の説明を入力" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px; height: 120px; resize: vertical;">{{ old('description') }}</textarea>
                    @error('description') <p style="color: #ff4d4f; font-size: 0.8rem; margin: 0;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
                    <a href="/" style="background-color: #dadada; color: #333; padding: 10px 40px; text-decoration: none; border-radius: 4px; font-size: 0.9rem;">
                        戻る
                    </a>
                    <button type="submit" style="background-color: #f0ad4e; color: white; border: none; padding: 10px 40px; border-radius: 4px; cursor: pointer; font-size: 0.9rem; font-weight: bold;">
                        登録
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>