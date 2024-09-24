<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * フィルラブルなフィールドの設定
     */
    protected $fillable = [
        'assignee',
        'title',
        'category_id',
        'deadline',
        'priority',
        'load_level',
        'description',
        'user_id',
    ];

    /**
     * タスクに関連するユーザーのリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * タスクに関連するカテゴリのリレーション
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

