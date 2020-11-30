<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ItemBerkasUsulRenovasi extends Model
{
    protected $table = 'ItemUsulRenovasi';
    protected $fillable = ['id','IDUsulRenovasi','nosurat_permintaan','lkl','layout','approval_layout','anggaran_dana','vendor','spk','pengerjaan_lapangan','tanggal_mulai','tanggal_selesai','PenanggungJawab'];
    public static function getberkas($cari) 
    {
        return DB::table('ItemUsulRenovasi')
            ->orWhere('ItemUsulRenovasi.nosurat_permintaan', 'like', '%' . $cari . '%');
            /*->orWhere('ItemUsulRenovasi.lkl', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.approval_layout', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.vendor', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.spk', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.tanggal_mulai', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.tanggal_selesai', 'like', '%' . $cari . '%')
            ->orWhere('ItemUsulRenovasi.PenanggungJawab', 'like', '%' . $cari . '%')*/
    }
}
