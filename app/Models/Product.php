<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
            'name',
            'price',
            'stock',
            'image',
    ];
    
    public function purchase()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }
}
