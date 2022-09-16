<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model
{
    use HasFactory;

    protected $table = 'wajib_pajak';

    protected $primaryKey = 'no_pelayanan';

    protected $fillable = [
        'no_pelayanan',
        'nama_wp',
        'no_hp',
        'alamat_pemohon',
        'alamat_objek_pajak',
        'luas_tanah',
        'luas_bangunan',
        'id_pelayanan',
        'id_status',
    ];

}