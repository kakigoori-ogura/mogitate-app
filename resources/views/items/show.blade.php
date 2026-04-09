<div style="background-color: #f8f8f8; min-height: 100vh; font-family: 'Helvetica Neue', Arial, sans-serif; color: #333;">

    <header style="background-color: #fff; padding: 10px 20px; border-bottom: 1px solid #eee; margin-bottom: 40px;">
        <h1 style="color: #f0ad4e; font-family: 'Hiragino Mincho ProN', 'serif'; font-size: 0.9rem; margin: 0;">
            mogitate
        </h1>
    </header>

    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
        <p style="margin-bottom: 20px;">
            <a href="/" style="color: #f0ad4e; text-decoration: none; font-size: 0.9rem;">商品一覧</a> ＞ {{ $item->name }}
        </p>

        <div style="background-color: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; gap: 40px;">
            
            <div style="flex: 1;">
                <img src="{{ asset('storage/' . $item->image) }}" style="width: 100%; border-radius: 4px; object-fit: cover;">
            </div>

            <div style="flex: 1; display: flex; flex-direction: column;">
                <h2 style="font-size: 1.8rem; margin: 0 0 20px 0; font-weight: bold;">{{ $item->name }}</h2>
                
                <p style="margin: 0 0 15px 0; font-size: 1.2rem;">価格：<span style="font-weight: bold;">¥{{ number_format($item->price) }}</span></p>
                <p style="margin: 0 0 15px 0;">季節：{{ is_array($item->season) ? implode(', ', $item->season) : $item->season }}</p>
                
                <div style="margin-top: 20px; flex-grow: 1;">
                    <p style="font-weight: bold; margin-bottom: 10px;">商品説明</p>
                    <p style="line-height: 1.6; color: #666;">{{ $item->description }}</p>
                </div>

                <div style="align-items: center; display: flex; gap: 15px; margin-top: 40px;">
                    <a href="/items/{{ $item->id }}/edit" style="background-color: #f0ad4e; color: white; padding: 10px 30px; text-decoration: none; border-radius: 4px; font-weight: bold;">
                        編集
                    </a>
                    <form action="/items/{{ $item->id }}/delete" method="POST" style="margin: 0;display: inline-block; vertical-align: middle;">
                        @csrf
                        <button type="submit" style="background-color: #dadada; color: #333; border: none; display: inline-block; padding: 13px 30px; border-radius: 4px; cursor: pointer; font-size: 0.9rem; font-weight: bold;">
                            🗑削除
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>