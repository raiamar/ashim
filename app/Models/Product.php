<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $fillable = [
        'menu_name',
        'description',
        'price',
        'image',
        'user_id',
    ];



    public function project_ratings()
    {
        return $this->hasMany('App\Models\Rating', 'menu_id', 'id');
    }

    public function avgRating()
    {
        return $this->project_ratings->avg('rating');
    }
}

