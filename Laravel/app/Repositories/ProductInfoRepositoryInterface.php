<?php

namespace App\Repositories;

interface ProductInfoRepositoryInterface
{
    /**
     * 商品情報一覧取得
     *
     * @param
     * @return
     */
    public function getAll();

    /**
     * 商品情報件数取得
     *
     * @param
     * @return
     */
    public function getCount();

    /**
     * 商品情報取得
     *
     * @param Request $request
     * @return
     */
    public function getProduct($request);

    /**
     * 商品削除済み
     *
     * @param $product
     * @return
     */
    public function deletedCheck($product);

    /**
     * 商品情報登録
     *
     * @param Request $request
     * @return
     */
    public function store($request);

    /**
     * 商品情報更新
     *
     * @param Request $request, $product
     * @return
     */
    public function update($request, $product);

    /**
     * 商品情報削除
     *
     * @param Request $request, $product
     * @return
     */
    public function delete($request, $product);
}
