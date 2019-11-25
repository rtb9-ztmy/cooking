@php
// 商品情報更新ページ
@endphp

<!-- 共通レイアウト -->
@extends('layouts.layout')

@section('PageTitle', '商品情報更新')

<!-- コンテンツ -->
@section('content')
    <div class="float-right w-25">
        <div class="float-left mb-4">
          <form enctype="multipart/form-data"　action="/product-update" method="post" id="update">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-outline-primary btn-lg" id="update_btn">更新</button>
          </form>
        </div>

        <div class="float-left ml-3">
          <form action="/product-delete" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="ProductID" value="{{ $product->ProductID }}">
              <button type="submit" class="btn btn-outline-primary btn-lg" id="delete_btn">削除</button>
          </form>
        </div>

        <div class="float-left ml-3">
          <form action="/product-list" method="get">
              <button type="submit" class="btn btn-outline-primary btn-lg" id="return_btn">戻る</button>
          </form>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="content w-50 mx-auto">
        <form action="/product-update" method="post" class="UpdateForm">
            <div class="form-group mb-4">
                <label for="ProductID">商品ID</label>
                <input readonly type="text" name="ProductID" value="{{ $product->ProductID }}" form="update" class="form-control ml-3" id="ProductID">
            </div>

            <div class="form-group mb-4">
                <label for="Genre">ジャンル</label>
                <select name="Genre" form="update" class="form-control ml-3" id="Genre">
                @foreach (config('enum') as $enum => $enumName)
                @if ($product->Genre == $enum)
                <option value="{{ $enum }}" selected>{{ $enumName }}</option>
                @else
                <option value="{{ $enum }}">{{ $enumName }}</option>
                @endif
                @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="Maker">メーカー<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="Maker" value="{{ $product->Maker }}" form="update" class="form-control ml-3" id="Maker">
                @if ($errors->has('Maker'))
                <p class="text-danger ml-3">{{ $errors->first('Maker') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductName">商品名<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="ProductName" value="{{ $product->ProductName }}" form="update" class="form-control ml-3" id="ProductName">
                @if ($errors->has('ProductName'))
                <p class="text-danger ml-3">{{ $errors->first('ProductName') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="SellingPrice">販売価格<span class="badge badge-danger ml-2">必須</span></label>
                <input type="text" name="SellingPrice" value="{{ $product->SellingPrice }}" form="update" class="form-control ml-3" id="SellingPrice">
                @if ($errors->has('SellingPrice'))
                <p class="text-danger ml-3">{{ $errors->first('SellingPrice') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductDetail">商品説明</label>
                <input type="textarea" name="ProductDetail" value="{{ $product->ProductDetail }}" form="update" class="form-control ml-3" id="ProductDetail">
                @if ($errors->has('ProductDetail'))
                <p class="text-danger ml-3">{{ $errors->first('ProductDetail') }}</p>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="ProductImage">商品画像</label>
                <input type="file" name="ProductImage" form="update" class="form-control-file ml-3" id="ProductImage">
                @if ($errors->has('ProductImage'))
                @foreach ($errors->get('ProductImage') as $error)
                <p class="text-danger ml-3">{{ $error }}</p>
                @endforeach
                @endif
            </div>
        </form>
    </div>
@endsection
