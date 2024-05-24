<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'weight',	'unit_id'];

    public function productDetails() {
        return $this->hasOne(ProductDetail::class);
    }

    public function supplier() {
        return $this->belongsTo(supplier::class);
    }
}
