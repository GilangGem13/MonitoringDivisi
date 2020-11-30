<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plotting extends Model
{
    protected $table = 'plotting';
    protected $fillable = ['id','divisi','gedung','lantai','status','rencana_divisi','tanggal_masuk','tanggal_keluar'];
}
