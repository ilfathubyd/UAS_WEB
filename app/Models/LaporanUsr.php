<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanUsr extends Model
{
    protected $table = 'laporan_usr';

    protected $fillable = [
        'akun', // Alamat email pengguna
        'nominal', // Jumlah VP yang dibeli
        'date',
        'status', // Status pesanan (misalnya, 'PROCCES')
        'subs',
    ];
}
