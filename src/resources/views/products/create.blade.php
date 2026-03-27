@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')

<div class="form-wrapper">
    <h2 class="title">商品登録</h2>

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- 商品名 -->
        <div class="form-group">
            <label>商品名 <span class="required">必須</span></label>
            <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 価格 -->
        <div class="form-group">
            <label>値段 <span class="required">必須</span></label>
            <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
            @foreach ($errors->get('price') as $message)
                <p class="error">{{ $message }}</p>
            @endforeach

        </div>

        <!-- 画像 -->
        <div class="form-group">
            <label>商品画像 <span class="required">必須</span></label>
            <input type="file" name="image">
            @foreach ($errors->get('image') as $message)
                <p class="error">{{ $message }}</p>
            @endforeach
        </div>

        <!-- 季節 -->
        <div class="form-group">
            <label>季節 <span class="required">必須</span> <span class="multi">複数選択可</span></label>
            <div class="radio-group">
                <label><input type="checkbox" name="season[]" value="1"> 春</label>
                <label><input type="checkbox" name="season[]" value="2"> 夏</label>
                <label><input type="checkbox" name="season[]" value="3"> 秋</label>
                <label><input type="checkbox" name="season[]" value="4"> 冬</label>
            </div>
            @error('season')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 説明 -->
        <div class="form-group">
            <label>商品説明 <span class="required">必須</span></label>
            <textarea name="description" placeholder="商品の説明を入力" value="{{ old('description') }}"></textarea>
            @foreach ($errors->get('price') as $message)
                <p class="error">{{ $message }}</p>
            @endforeach
        </div>

        <!-- ボタン -->
        <div class="button-group">
            <a href="/products" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>

    </form>
</div>
@endsection