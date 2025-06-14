<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['title', 'description', 'price', 'image', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
