<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    //添加可搜索条件，比如status=1
    public function shouldBeSearchable(): bool
    {
        return true;
    }
}
