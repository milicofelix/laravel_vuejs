<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class, 'product_orders')->withPivot('created_at', 'updated_at');
    }
}
