<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'site', 'uf', 'email'];

    public function products() {

        return $this->hasMany(Product::class);
    }
}
