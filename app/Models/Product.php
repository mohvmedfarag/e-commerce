<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'price', 'image', 'quantity', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    public function isFavorite(){
        return $this->favorites()->where('user_id', Auth::user()->id)->exists();
    }
}
