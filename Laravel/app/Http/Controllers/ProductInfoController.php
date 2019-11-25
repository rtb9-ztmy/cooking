<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\Http\Requests\ProductInfoRequest;
use App\Repositories\ProductInfoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductInfoController extends Controller
{
      private $ProductInfoRepository;

    public function __construct(ProductInfoRepositoryInterface $ProductInfoRepository)
    {
      $this->ProductInfoRepository = $ProductInfoRepository;
      $this->middleware('auth');
    }

    /**
    * 商品情報一覧ページ表示
    *
    * @param
    * @return view
    */
    public function index()
    {
      $products = $this->ProductInfoRepository->getAll();
      $DisplayedResult = $this->ProductInfoRepository->getCount();
      $param = [
          'products' => $products,
          'DisplayedResult' => $DisplayedResult,
      ];

      return view('pages.product-list', $param);
    }

    /**
    * 商品情報登録ページ表示
    *
    * @param
    * @return view
    */
    public function create()
    {
      return view('pages.product-registration');
    }

    /**
    * 商品情報登録
    *
    * @param ProductInfoRequest $request
    * @return redirect
    */
    public function store(ProductInfoRequest $request)
    {
      $this->ProductInfoRepository->store($request);
      $products = $this->ProductInfoRepository->getAll();
      $DisplayedResult = $this->ProductInfoRepository->getCount();
      $param = [
          'msg' => '商品を登録しました。',
          'products' => $products,
          'DisplayedResult' => $DisplayedResult,
      ];

      return view('pages.product-list', $param);
    }

    /**
    * 商品情報更新ページ表示
    *
    * @param Request $request
    * @return view
    */
    public function edit(Request $request)
    {
      if (isset($request->ProductID) === false) {
          return redirect('product-list');
      }

      $product = $this->ProductInfoRepository->getProduct($request, $request->ProductID);
      if ($this->ProductInfoRepository->deletedCheck($product) === true) {
          return redirect('product-list')->with('msg', '<p class="text-danger">この商品はすでに削除されています。</p>');
      }

      return view('pages.product-update', ['product' => $product]);
    }

    /**
    * 商品情報更新
    *
    * @param ProductInfoRequest $request
    * @return redirect
    */
    public function update(ProductInfoRequest $request)
    {
      $product = $this->ProductInfoRepository->getProduct($request, $request->CurrentProductID);
      $msg = $this->ProductInfoRepository->update($request, $product);

      return redirect('/product-list')->with('msg', $msg);
    }

    /**
    * 商品情報削除
    *
    * @param Request $request
    * @return redirect
    */
    public function delete(Request $request)
    {
      $product = $this->ProductInfoRepository->getProduct($request);
      $msg = $this->ProductInfoRepository->delete($request, $product);

      return redirect('/product-list')->with('msg', $msg);
    }

    /**
    * ログアウト
    *
    * @param
    * @return redirect
    */
    public function logout()
    {
      Auth::logout();

      return redirect('login');
    }
}
