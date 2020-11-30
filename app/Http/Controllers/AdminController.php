<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemBerkasUsulRenovasi;
use PDF;
use Illuminate\Support\Facades\Storage;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function BerkasUsulRenovasi($id)
     {
         $dataUsulRenovasi = usulrenovasi::findOrFail($id);
         $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::paginate(5);
         return view('UsulRenovasi.UsulRenovasiItem.BerkasUsulRenovasi', compact('dataUsulRenovasi','dataBerkasUsulRenovasi'));
     }
    public function downloadLayout($id)
     {
        $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::find($id);
        return Storage::download($dataBerkasUsulRenovasi->layout);
     }
}
