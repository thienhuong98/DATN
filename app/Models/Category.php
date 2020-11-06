<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'categories_products','category_id','product_id');
    }

    public function suggestions(){
        return $this->hasMany(Suggestion::class);
    }
}
