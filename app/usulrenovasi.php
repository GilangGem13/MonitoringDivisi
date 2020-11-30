<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class usulrenovasi extends Model
{
    protected $table = 'usul_renovasi';
    protected $fillable = ['id','divisi','gedung','lantai','status','kapasitas','luas_ruangan','tanggal_mulai','tanggal_selesai'];

    public static function getusulrenovasi($cari) 
    {
        return DB::table('usul_renovasi')
            ->orWhere('usul_renovasi.status', 'like', '%' . $cari . '%');
            /*->orWhere('usul_renovasi.divisi', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.gedung', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.lantai', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.kapasitas', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.luas_ruangan', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.tanggal_mulai', 'like', '%' . $cari . '%')
            ->orWhere('usul_renovasi.tanggal_selesai', 'like', '%' . $cari . '%')*/
    }
}