<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public static function set(string $name, ?int $articleId = null, ?int $categoryId = null)
    {
        $logObj = new Log();

        if ($articleId) {
            $logObj = $logObj->where('article_id', $articleId);
        }

        if ($categoryId) {
            $logObj = $logObj->where('category_id', $categoryId);
        }

        if ($logObj->count() > 0) {
            $logObj = $logObj->first();
            $value  = $logObj->value;
        } else {
            $value  = 0;
            $logObj = new Log();
        }

        $logObj->name = $name;
        $logObj->value = $value += 1;
        $logObj->article_id = $articleId;
        $logObj->category_id = $categoryId;
        $logObj->save();

        return $logObj;
    }
}
