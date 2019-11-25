@php
// 商品情報登録ページ
@endphp

<!-- 共通レイアウト -->
@extends('layouts.layout')

@section('PageTitle', '商品情報登録')

<!-- コンテンツ -->
@section('content')
    <div class="float-right w-25">
        <div class="float-left mb-4">
          <form enctype="multipart/form-data" action="/product-registration" method="post" id="registration">
              {{ csrf_field() }}
              <button class="btn btn-outline-primary btn-lg" type="submit" id="registration_btn">登録</button>
          </form>
        </div>

        <div class="float-left ml-3">
          <form action="/product-list" method="get" id="return">
              <button class="btn btn-outline-primary btn-lg" type="submit" name="return" id="return_btn">戻る</button>
          </form>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="content w-50 mx-auto">
        <form action="" method="post" class="RegistrationForm">
            <div class="form-group mb-4">
                <label for="Genre">ジャンル</label>
                <select name="Genre" form="registration" class="form-control ml-3" id="Genre">
                    @foreach (config('enum') as $enum => $enumName)
                    <option value="{{ $enum }}">{{ $enumName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="Maker">メーカー<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="Maker" form="registration" class="form-control ml-3" id="Maker">
                @if ($errors->has('Maker'))
                <p class="text-danger ml-3">{{ $errors->first('Maker') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductName">商品名<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="ProductName" form="registration" class="form-control ml-3" id="ProductName">
                @if ($errors->has('ProductName'))
                <p class="text-danger ml-3">{{ $errors->first('ProductName') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="SellingPrice">販売価格<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="SellingPrice" form="registration" class="form-control ml-3" id="SellingPrice">
                @if ($errors->has('SellingPrice'))
                <p class="text-danger ml-3">{{ $errors->first('SellingPrice') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductDetail">商品説明</label>
                <textarea name="ProductDetail" form="registration" class="form-control ml-3" id="ProductDetail"></textarea>
                @if ($errors->has('ProductDetail'))
                <p class="text-danger ml-3">{{ $errors->first('ProductDetail') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductImage">商品画像</label>
                <input type="file" name="ProductImage" form="registration" class="form-control-file ml-3" id="ProductImage">
                @if ($errors->has('ProductImage'))
                @foreach ($errors->get('ProductImage') as $error)
                <p class="text-danger ml-3">{{ $error }}</p>
                @endforeach
                @endif
            </div>
        </form>
    </div>
@endsection
