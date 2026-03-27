@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<div class="container">

    <h2>商品詳細</h2>

    <div class="form-area">

        <!-- 左：画像 -->
        <div class="image-area">
            <img src="{{ asset('storage/' . $product->image) }}" width="300">
        </div>

        <!-- 右：情報 -->
        <div class="input-area">

            <label>商品名</label>
            <p>{{ $product->name }}</p>

            <label>価格</label>
            <p>{{ $product->price }}円</p>

            <label>季節</label>
            <div class="season-area">
                @foreach ($product->seasons as $season)
                    <span>{{ $season->name }}</span>
                @endforeach
            </div>

            <label>商品説明</label>
            <p>{{ $product->description }}</p>

        </div>
    </div>

    <!-- ボタン -->
    <div class="button-area">
        <a href="/products" class="back-btn">戻る</a>

        <a href="/products/{{ $product->id }}/edit" class="submit-btn">
            編集する
        </a>
    </div>

</div>

@endsection