<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = "id";

    protected $fillable = ['id', 'product_id','harga', 'quantity', 'totalharga', 'tanggal','update_at', 'created_at'];

    public function product(){
        return $this -> belongsTo(product::class);
    }

}