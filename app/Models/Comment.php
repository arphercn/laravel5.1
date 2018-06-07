<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['content'];

    // 当Comment模型被更新时，你可能想要”触发“创建其所属模型Post的updated_at时间戳。
    protected $touches = ['item'];

    //
    public function item()
    {
        return $this->morphTo();
    }
}
