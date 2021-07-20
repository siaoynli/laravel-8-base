<?php

namespace App\Models;

use App\Casts\JsonCast;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends  Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable;


    protected $fillable = [
        "name",
        "email",
        "email_verified_at",
        "password",
        "option",
        "registered_at",
        "role_id",
    ];

    protected $casts = [
        "option" => JsonCast::class
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //自定义字段显式输出
    protected $appends=["fullname"];


    //自定义字段
    public function getFullnameAttribute(): string
    {
        return Str::title($this->name);
    }

    public function hasRole(string $role): bool
    {
        return $this->roles->where('name', $role)->isNotEmpty();
    }


    public function roles(): belongsTo
    {
        return $this->belongsTo(Role::class,"role_id")->withTimestamps();
    }


    public function isAdmin():bool
    {
        return $this->hasRole("admin");
    }

    /**
     * @param  Builder  $query
     * @return Builder
     * User::latest()
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('registered_at', 'desc');
    }


}
