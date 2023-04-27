<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getPopular(): ?object
    {
        return Category::leftJoin('logs', 'logs.category_id', '=', 'categories.id')
            ->select('categories.*', 'logs.value as views')
            ->orderByDesc('logs.value')
            ->whereNotNull('logs.value')
            ->limit(4)
            ->get();
    }

    public function log()
    {
        return $this->hasOne(Log::class, 'category_id', 'id');
    }
}
