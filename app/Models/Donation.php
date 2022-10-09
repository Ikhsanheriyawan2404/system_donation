<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
