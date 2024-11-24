<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'pengiriman';

    // Menentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'material_id',
        'tanggal_kirim',
        'tanggal_selesai',
        'estimasi',
        'status_pengiriman',
        'order_id'
    ];

    // Jika menggunakan relasi, tambahkan fungsi untuk relasi foreign key
    // public function material()
    // {
    //     return $this->belongsTo(Material::class);
    // }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
