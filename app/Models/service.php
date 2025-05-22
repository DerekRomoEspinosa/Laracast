<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model {
    use HasFactory;

    protected $table = 'service_listings';

    protected $fillable = ['title', 'description'];

    public function developer()
    {
        return $this->belongsTo(developer::class);
    }

        public function tags()
        {
            return $this->belongsToMany(Tag::class, foreignPivotKey: "service_listing_id");
        }

}
