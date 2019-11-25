@php
// 商品情報一覧ページ
@endphp

<!-- 共通レイアウト -->
@extends('layouts.layout')

@section('PageTitle', '商品情報一覧')

<!-- コンテンツ -->
@section('content')
{!! session('msg') !!}
@isset ($msg)
    <p>{{ $msg }}</p>
@endisset
    <div class="float-right mb-4">
      <form action="/product-registration" method="get">
          <button type="submit" class="registration_btn　btn btn-outline-primary btn-lg">登録</button>
      </form>
    </div>
    <div class="clearfix"></div>

    <p class="text-right mb-0">商品情報件数 {{ $DisplayedResult }}件</p>

    <table class="table table-bordered text-center">
            <tr>
                <th>イメージ</th>
                <th>商品ID</th>
                <th>ジャンル</th>
                <th>メーカー</th>
                <th>商品名</th>
                <th>販売価格</th>
                <th>更新</th>
            </tr>
            @foreach ($products as $product)
            @if (!$product->DeleteFlg == 1)
            <tr>
                <td><img src="{{ asset('storage/productImage/' . $product->ProductImg) }}" alt=""></td>
                <td class="align-middle">{{ $product->ProductID }}</td>
                <td class="align-middle">
                @foreach (config('enum') as $enum => $enumName)
                @if ($enum == $product->Genre)
                {{ $enumName }}
                @endif
                @endforeach
                </td>
                <td class="align-middle">{{ $product->Maker }}</td>
                <td class="align-middle">{{ $product->ProductName }}</td>
                <td class="align-middle">{{ $product->SellingPrice }}</td>
                <td class="align-middle">
                    <form action="/product-update" method="get">
                        <input type="hidden" name="ProductID" value="{{ $product->ProductID }}">
                        <button class="btn btn-outline-primary btn-lg" type="submit">更新</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
    </table>
@endsection
