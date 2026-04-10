<div style="background-color: #f8f8f8; min-height: 100vh; font-family: 'Helvetica Neue', Arial, sans-serif; color: #333; padding-bottom: 40px;">

    <header style="background-color: #fff; padding: 10px 20px; border-bottom: 1px solid #eee; margin-bottom: 40px;">
        <h1 style="color: #f0ad4e; font-family: 'Hiragino Mincho ProN', 'serif'; font-size: 0.9rem; margin: 0;">
            mogitate
        </h1>
    </header>

    <div style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
        <p style="margin-bottom: 20px; font-size: 0.9rem;">
            <a href="/" style="color: #f0ad4e; text-decoration: none;">商品一覧</a> > {{ $item->name }}
        </p>

        <div style="padding: 40px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            
            <form action="/items/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div style="display: flex; gap: 40px; margin-bottom: 30px;">
                    
                    <div style="flex: 1;">
                        <img src="{{ asset('storage/' . $item->image) }}" style="width: 100%; border-radius: 4px; margin-bottom: 15px;">
                        <input type="file" name="image" style="font-size: 0.8rem;">
                        @error('image') <p style="color: #ff4d4f; font-size: 0.8rem;">{{ $message }}</p> @enderror
                    </div>

                    <div style="flex: 1.5; display: flex; flex-direction: column; gap: 20px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px;">商品名</label>
                            <input type="text" name="name" value="{{ old('name', $item->name) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                            @error('name') <p style="color: #ff4d4f; font-size: 0.8rem;">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px;">価格</label>
                            <input type="text" name="price" value="{{ old('price', $item->price) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                            @error('price') <p style="color: #ff4d4f; font-size: 0.8rem;">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px;">季節</label>
                            <div style="display: flex; gap: 15px;">
                                @php $seasons = is_array($item->season) ? $item->season : explode(',', $item->season); @endphp
                                @foreach(['春', '夏', '秋', '冬'] as $s)
                                    <label><input type="checkbox" name="season[]" value="{{ $s }}" {{ in_array($s, old('season', $seasons)) ? 'checked' : '' }}> {{ $s }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">商品説明</label>
                    <textarea name="description" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; height: 120px; resize: vertical;">{{ old('description', $item->description) }}</textarea>
                </div>

                <div style="display: flex; justify-content: center; gap: 20px;">
                    <a href="/items/{{ $item->id }}" style="background-color: #dadada; color: #333; padding: 10px 40px; text-decoration: none; border-radius: 4px;">戻る</a>
                    <button type="submit" style="background-color: #f0ad4e; color: white; border: none; padding: 10px 40px; border-radius: 4px; cursor: pointer; font-weight: bold;">変更を保存</button>
                </div>
            </form>
        </div>
    </div>
</div>