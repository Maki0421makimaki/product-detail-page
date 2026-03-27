@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')

<div class="container">

    <h2>商品編集</h2>

    <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-area">

            <!-- 左：画像 -->
            <div class="image-area">
                <img src="{{ asset('storage/' . $product->image) }}" width="300">

                <input type="file" name="image">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- 右：入力 -->
            <div class="input-area">

                <!-- 商品名 -->
                <label>商品名</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror

                <!-- 価格 -->
                <label>価格</label>
                <input type="text" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror

                <!-- 季節 -->
                <label>季節</label>
                <div class="season-area">
                    @foreach ($seasons as $season)
                        <label>
                            <input 
                                type="checkbox" 
                                name="season[]" 
                                value="{{ $season->id }}"
                                {{ in_array($season->id, old('season', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}
                            >
                            {{ $season->name }}
                        </label>
                    @endforeach
                </div>

                @error('season')
                    <p class="error">季節を選択してください</p>
                @enderror

                <!-- 説明 -->
                <label>商品説明</label>
                <textarea name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <!-- ボタン -->
        <div class="button-area">
            <a href="/products" class="back-btn">戻る</a>
            <button type="submit" class="submit-btn">変更を保存</button>
        </div>

        <div class="delete-area">
            <form action="/products/{{ $product->id }}/delete" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24"
                        viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M3 6h18"/>
                        <path d="M8 6V4h8v2"/>
                        <path d="M19 6l-1 14H6L5 6"/>
                        <path d="M10 11v6"/>
                        <path d="M14 11v6"/>
                    </svg>
        </button>
            </form>
        </div>

    </form>

</div>

@endsection