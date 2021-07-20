<?php

namespace App\Http\Requests;


use App\Rules\AlphaUserName;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserRequest extends BaseRequest
{

    public function rules(): array
    {

        return [
            'user_name' => ['required', "max:20", new AlphaUserName],
            'email' => ['unique:users,email,'.(optional($this->user)->id ?: 'NULL')],
        ];
    }

    //如果您需要在应用验证规则之前准备或清理请求中的任何数据，
    //您可以使用以下prepareForValidation方法
    public function prepareForValidation(): void
    {
        $this->merge([
            'posted_at' => Carbon::parse($this->input('posted_at')),
            'slug' => Str::slug($this->input('title'), '_'),
            'remark' => Str::limit(Str::random(60), 20),
            'sex' => Str::contains($this->input('user_name') ?? '', ['li', 'aa'])
        ]);

    }



}
