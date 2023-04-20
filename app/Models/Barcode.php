<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'nik',
        'kelompok',
       'kelompokno',
        'brand',
       'no_box',
       'no_bal',
        'barcode',
       'tgl_input',
    ];
}
