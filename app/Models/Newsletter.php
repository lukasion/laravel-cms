<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletter';

    public function status()
    {
        return $this->hasOne(NewsletterStatus::class, 'id', 'status_id');
    }
}
