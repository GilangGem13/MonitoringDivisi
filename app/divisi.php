<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    protected $table = 'divisi';
    protected $fillable = ['id','divisi','gedung','lantai','status','tanggal_masuk','tanggal_keluar'];

    public static function getdivisi($cari) 
    {
        return DB::table('divisi')
            ->orWhere('divisi.status', 'like', '%' . $cari . '%');
    }
}