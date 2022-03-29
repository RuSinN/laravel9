<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','category_id','description','content','posted','image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
