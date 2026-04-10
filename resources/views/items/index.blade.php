<div style="background-color: #f8f8f8; min-height: 100vh; font-family: 'Helvetica Neue', Arial, sans-serif; color: #333;">

    <header style="background-color: #fff; padding: 8px 20px; border-bottom: 1px solid #eee;">
        <h1 style="color: #f0ad4e; font-family: 'Hiragino Mincho ProN', 'serif'; font-size: 0.9rem; margin: 0; font-weight: normal;">
            mogitate
        </h1>
    </header>

    <div style="display: flex; gap: 40px; padding: 30px 20px; max-width: 1000px; margin: 0 auto;">

        <aside style="width: 200px; flex-shrink: 0;">
            <h2 style="font-size: 1.1rem; margin: 0 0 20px 0; font-weight: bold;">商品一覧</h2>
            
            <form method="GET" action="/items" style="display: flex; flex-direction: column; gap: 15px;">
                <input type="text" name="keyword" placeholder="商品名で検索" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">

                <div>
                    <label style="font-size: 0.75rem; color: #888;">価格順で表示</label>
                    <select name="sort" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; margin-top: 5px; background: #fff;">
                        <option value="">選択してください</option>
                        <option value="asc">価格が安い順</option>
                        <option value="desc">価格が高い順</option>
                    </select>
                </div>

                <button type="submit" style="background-color: #f0ad4e; color: white; border: none; padding: 10px; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                    検索
                </button>
            </form>
        </aside>

<main style="flex: 1;">
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="/items/create" style="background-color: #f0ad4e; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 0.8rem;">
            ＋ 商品を追加
        </a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
        @foreach ($items as $item)
        <a href="/items/{{ $item->id }}" style="text-decoration: none; color: inherit; display: block;">
            <div style="background: #fff; border-radius: 4px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <img src="{{ asset('storage/' . $item->image) }}" style="width: 100%; height: 120px; object-fit: cover;">
                <div style="padding: 10px;">
                    <p style="margin: 0; font-size: 0.85rem;">{{ $item->name }}</p>
                    <p style="margin: 5px 0 0; font-weight: bold; text-align: right; font-size: 0.9rem;">
                        ¥{{ number_format($item->price) }}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div> 
    <div class="pagination-wrapper" style="margin-top: 30px;">
{{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
</main>
<style>
    
    .pagination-wrapper .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        gap: 8px;
    }

    .pagination-wrapper .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50% !important;
        border: none;
        background-color: transparent;
        color: #666;
        font-size: 0.8rem;
    }

    .pagination-wrapper .page-item.active .page-link {
        background-color: #f0ad4e !important;
        color: white !important;
    }

    .pagination-wrapper .page-item:first-child,
    .pagination-wrapper .page-item:last-child,
    .pagination-wrapper svg {
        display: none !important;
    }
</style>
            </div>
        </main>
    </div>
</div>