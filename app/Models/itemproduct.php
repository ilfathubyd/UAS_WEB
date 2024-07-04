<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_item';

    protected $fillable = [
        'id_products', 
        'item', 
        'harga', 
        'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_products', 'id_products');
    }
}
