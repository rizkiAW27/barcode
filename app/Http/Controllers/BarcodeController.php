<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barcode;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Picqer\Barcode\BarcodeGenerator;
class BarcodeController extends Controller
{
    public function store_barcode(Request $request){
        $barcodes = $request->input('barcode');
        $no_box = $request->input('no_box');
        $no_bal = $request->input('no_bal');
        $nama = Auth::user()->name;
        $lokasi = "TPO Bantul";
        $barcode = substr($barcodes, 0, 6);
        $date = date('Y-m-d');

        $karyawan = Karyawan::where('nik', 'like', "$barcode%")->first();
        
       if($karyawan != null){
            $id = $karyawan->nik;
            $id_kry = substr($id, 0, 6);

            if($barcode == $id_kry){
                Barcode::create([
                     'nama' => $nama,
                     'lokasi' => $lokasi,
                     'nik' => $id,
                     'kelompok' => $karyawan->kelompok,
                     'kelompokno' => $karyawan->kelompokno,
                     'brand' => $karyawan->brand,
                     'no_box' => $no_box,
                     'no_bal' => $no_bal,
                     'barcode' => $barcodes,
                     'tgl_input' => $date,
                ]);
     
                return redirect()->back();
             }else {
                 return redirect()->back();
             }
       }else {
            return redirect()->back();
       }    

    }

    public function preview(){
        return view('preview');
    }
}
