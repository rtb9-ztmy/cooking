<?php

namespace App\Repositories;

use App\Repositories\ProductInfoRepositoryInterface;
use App\Product;
use Carbon\Carbon;

//use Your Model
/**
 * Class ProductInfoRepository
 */
class ProductInfoRepository implements ProductInfoRepositoryInterface
{
    /**
     * 商品情報一覧取得
     *
     * @param
     * @return
     */
    public function getAll()
    {
        return Product::all()->where('DeleteFlg', '=', '0');
    }

    /**
     * 商品情報件数取得
     *
     * @param
     * @return
     */
    public function getCount()
    {
        return Product::all()->where('DeleteFlg', '=', '0')->count();
    }

    /**
     * 商品情報取得
     *
     * @param $request
     * @return
     */
    public function getProduct($request)
    {
        return Product::find($request->input('ProductID'));
    }

    /**
     * 商品情報削除済み
     *
     * @param $request
     * @return
     */
    public function deletedCheck($product)
    {
        if ($product->DeleteFlg === '1') {
            return true;
        }
    }

    /**
     * 商品情報更新
     *
     * @param $request
     * @return
     */
    public function store($request)
    {
        if (isset($request->ProductImage)) {
            //画像保存処理
            $FileName = $request->file('ProductImage')->getClientOriginalName();
            $request->file('ProductImage')->storeAs('public/ProductImage', $FileName);
        } else {
            $FileName = 'no_image.png';
        }

        $product = new Product();
        $product->ProductName = $request->ProductName;
        $product->Genre = $request->Genre;
        $product->Maker = $request->Maker;
        $product->SellingPrice = $request->SellingPrice;
        $product->ProductDetail = $request->ProductDetail;
        $product->ProductImg = $FileName;
        $product->DeleteFlg = "0";
        $product->save();
    }

    /**
     * 商品情報更新
     *
     * @param $request
     * @return
     */
    public function update($request, $product)
    {
        if (isset($request->ProductImage)) {
            //画像保存処理
            $FileName = $request->file('ProductImage')->getClientOriginalName();
            $request->file('ProductImage')->storeAs('public/ProductImage', $FileName);
        } else {
            $FileName = $product->ProductImg;
        }

        $product->ProductName = $request->ProductName;
        $product->Genre = $request->Genre;
        $product->Maker = $request->Maker;
        $product->SellingPrice = $request->SellingPrice;
        $product->ProductDetail = $request->ProductDetail;
        $product->ProductImg = $FileName;

        //DB変更確認
        if ($product->isDirty()) {
            //変更あり
            $product->UpdateDate = Carbon::now();
            $product->save();
            $msg = '<p>商品情報を更新しました。<p>';
            return $msg;
        } else {
            //変更なし
            $msg = '<p class="text-danger">選択された情報は既に他ユーザーにより更新されています。</p>';
            return $msg;
        }
    }

    /**
     * 商品情報削除
     *
     * @param $request
     * @return
     */
    public function delete($request, $product)
    {
        $product->DeleteFlg = '1';
        //DB変更確認
        if ($product->isDirty('DeleteFlg')) {
            //変更あり
            $product->UpdateDate = Carbon::now();
            $product->save();
            $msg = '<p>商品情報を削除しました。</p>';
            return $msg;
        } else {
            //変更なし
            $msg = '<p class="text-danger">選択された情報は既に他ユーザーにより削除されています。</p>';
            return $msg;
        }
    }
}
