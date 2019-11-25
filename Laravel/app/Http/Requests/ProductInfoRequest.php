<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Maker' => ['required', 'max:20'],
            'ProductName' => ['required', 'max:25'],
            'SellingPrice' => ['integer', 'min:0', 'max:100000000'],
            'ProductDetail' => ['max:200'],
            'ProductImage' => ['mimes:jpeg,jpg,png', 'max:500',
                function ($attribute, $value, $fail) {
                    if ($value->getClientOriginalName() > 15) {
                        return  $fail('ファイル名（拡張子含む）が15桁を超える画像は登録できません。');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'Maker.required' => 'メーカー名の入力は必須です。',
            'Maker.max' => 'メーカー名は20桁以下の範囲で入力してください。',
            'ProductName.required' => '商品名の入力は必須です。',
            'ProductName.max' => '商品名は25桁以下の範囲で入力してください。',
            'SellingPrice.integer' => '販売価格は半角数字以外入力できません。',
            'SellingPrice.min' => '販売価格は1以上の範囲で入力してください。',
            'SellingPrice.max' => '販売価格は100000000以下の範囲で入力してください。',
            'ProductDetail.max' => '商品説明は200桁以下の範囲で入力してください。',
            'ProductImage.mimes' => 'ファイル形式が「JPEG」、「PNG」以外の画像は登録できません。',
            'ProductImage.max' => 'ファイルサイズが500KBを超える画像は登録できません。',
        ];
    }
}
