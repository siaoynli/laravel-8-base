<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user() ?? Auth::guard('api')->user();
        if ($user && !$user->isAdmin()) {
            $builder->where("is_admin", 0);
        }
    }
}
