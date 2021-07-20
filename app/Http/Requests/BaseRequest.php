<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class  BaseRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
        ];
    }

    public function attributes(): array
    {
        return [];
    }

    //验证的字段
    public  function  validated():array
    {
        return $this->all();
    }


    //在验证通过后触发的回调,比如验证通过之后返回不在验证中的字段
//    public function passedValidation():void
//    {
//        $this->replace(["pass"=>true]);
//    }

}