<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * フィルラブルなフィールドの設定
     */
    protected $fillable = ['name'];

    /**
     * カテゴリに関連するタスクのリレーション
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}