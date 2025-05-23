<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    use HasFactory;

    protected $table = 'product_listings';

    protected $fillable = ['title', 'description'];

    public function developer()
    {
        return $this->belongsTo(developer::class);
    }

        public function tags()
        {
            return $this->belongsToMany(Tag::class, foreignPivotKey: "product_listing_id");
        }

}

