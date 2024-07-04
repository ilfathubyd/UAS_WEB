<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporans extends Model
{
    protected $table = "laporan_usr";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'akun', 'nominal', 'date', 'total_pembayaran', 'status', 'subs', 'email'];
}
