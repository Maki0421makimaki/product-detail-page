@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="container">
    <!-- サイドバー -->
    <div class="sidebar">
        <form method="GET" action="/products">
                <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
                <button class="btn-yellow">検索</button>

                <p class="filter-title">価格順で表示</p>
                <select name="sort" onchange="this.form.submit()">
                    <option value="">選択してください</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                </select>
        </form>
    </div>


    <!-- メイン -->
    <div class="main">

        <!-- タイトル -->
        <div class="page-header">
            @if(request('keyword'))
                <h2>「{{ request('keyword') }}」の商品一覧</h2>
            @else
                <h2>商品一覧</h2>
            @endif

            <a href="/products/register" class="btn-add">
                ＋ 商品を追加
            </a>

        </div>


        <!-- 商品一覧 -->
        <div class="product-list">
            @foreach ($products as $product)
                <a href="/products/detail/{{ $product->id }}">
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product->image) }}">
                        <div class="product-info">
                            <p>{{ $product->name }}</p>
                            <p>¥{{ number_format($product->price) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="pagination">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection