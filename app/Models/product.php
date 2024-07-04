<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_products';

    protected $fillable = [
        'nama_product', 
        'gambar', 
        'url'
    ];

    public function itemProducts()
    {
        return $this->hasMany(ItemProduct::class, 'id_products', 'id_products');
    }
}
