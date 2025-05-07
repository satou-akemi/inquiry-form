<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => ['required|string'],
            'last_name' => ['required|string'],
            'gender' => ['required|'],
            'email' => ['required|email'],
            'tel1',=> ['required|string|max5'],
            'tel2' => ['required|string|max5'],
            'tel3' => ['required|string|max5'],
            'address' => ['required|string'],
            'category_id' => ['required'],
            'message' => ['required|max:120'],
        ];
    }

    public function messages(){
        return[
            'first_name.required' =>'姓を入力してください',
            'last_.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1,max' =>'電話番号は5桁までの数字で入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2,max' =>'電話番号は5桁までの数字で入力し',
            'tel3.required' => '電話番号を入力してください',
            'tel3,max' =>'電話番号は5桁までの数字で入力し',
            'address.required' =>'住所を入力してください',
            'category_id'=> 'お問い合わせの種類を選択してください',
            'message.required' => 'お問い合わせの内容を入力してください',
            '.message.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ]
    }
}
