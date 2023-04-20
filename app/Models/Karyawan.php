<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawan";
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nik',
        'pm',
       'tgl_masuk',
        'brand',
        'kelompok',
       'kelompokno',
        'golongan',
        'bagian',
       'jabatanid',
        'golonganmingguan',
       'asuransiid',
        'nama',
        'tempat_lahir',
       'tgl_lahir',
        'agama',
        'sex',
        'alamat',
        'kecamatan',
        'kota',
        'telp',
        'pendidikan',
        'jurusan',
        'kawin',
        'pekerjaanortu',
        'status',
        'tunj_haid',
        'upah_hr_mgg',
        'no_rekening',
        'no_ktp',
        'email',
        'kelurahan',
        'nama_ibu_kandung',
        'no_kk',
    ];
}
