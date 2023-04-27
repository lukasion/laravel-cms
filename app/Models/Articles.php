<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected function setFriendlyNameAttribute($string)
    {
        $separator = '-'; 
        $wordLimit = 10;

        if ($wordLimit != 0) { 
            $wordArr = explode(' ', $string); 
            $string = implode(' ', array_slice($wordArr, 0, $wordLimit)); 
        } 
     
        $quoteSeparator = preg_quote($separator, '#'); 
     
        $trans = array( 
            '&.+?;'                 => '', 
            '[^\w\d _-]'            => '', 
            '\s+'                   => $separator, 
            '('.$quoteSeparator.')+'=> $separator 
        ); 

        // Replace polish signs
        $string = str_replace(
            ['ą','ę','ć','ś','ł','ó','ż','ź','ń','Ą','Ę','Ć','Ś','Ł','Ó','Ż','Ź','Ń'], 
            ['a','e','c','s','l','o','z','z','n','A','E','C','S','L','O','Z','Z','N'], 
            $string);
     
        $string = strip_tags($string); 
        foreach ($trans as $key => $val){ 
            $string = preg_replace('#'.$key.'#iu', $val, $string); 
        } 
     
        $string = strtolower($string); 

        $this->attributes['friendly_name'] = trim(trim($string, $separator));
    }

    public function getByFriendlyName(string $friendlyName): ?self
    {
        return $this->where('friendly_name', $friendlyName)
            ->with('comments', 'log', 'category')
            ->first();
    }

    public static function getPopular(): ?object
    {
        return Articles::leftJoin('logs', 'logs.article_id', '=', 'articles.id')
            ->select('articles.*', 'logs.value as views')
            ->orderByDesc('logs.value')
            ->whereNotNull('logs.value')
            ->limit(4)
            ->get();
    }

    public function search(?string $title = null, ?string $content = null): object
    {
        $articles = $this->with('category');

        $articles = $articles->where(function ($query) use ($title, $content) {
            $query->where('name', 'LIKE', "%$title%")
                ->orWhere('content', 'LIKE', "%$content%");
        })->where('highlighted', 0);

        return $articles->orderByDesc('updated_at')
            ->paginate(8);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function log()
    {
        return $this->hasOne(Log::class, 'article_id', 'id');
    }
}
