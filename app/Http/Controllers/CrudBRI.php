<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usulrenovasi;
use PDF;
use App\divisi;
use App\Gedung;
use App\User;
use App\Lantai;
use App\renovasi;
use App\Status;
use App\ItemBerkasUsulRenovasi;
use App\plotting;
use App\DataDivisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
class CrudBRI extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeRegister(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'    =>  'required',
            'password'    =>  'required',
            'name'    =>  'required',
        ]);
        $form_data = array(
            'email' => $request->email,
            'password' => Hash::make($data['password']),
            'name' => $request->name,
           
        );

        User::create($form_data);
        return redirect('auth.register')->with('success', 'Data Added successfully.');
    }

    public function indexrenovasi()
    {
        $data = renovasi::paginate(1);
        return view('Renovasi.FrmRenovasi', compact('data'));
    }

    public function inputrenovasi(Request $request){
		return view('Renovasi.insertRenovasi');	
    }
    public function storerenovasi(Request $request)
    {    
        // dd($request->all);
        $fileSurat1 = $request->file('layout');
        $fileSurat2 = $request->file('anggaran_dana');
        //Ini adalah path tempat file diupload.
        $pathFileSurat1 = $fileSurat1->store('public/files/usul_renovasi');
        $pathFileSurat2 = $fileSurat2->store('public/files/usul_renovasi');
        $form_data = array(
            'nosurat_permintaan' => $request->nosurat_permintaan,
            'lkl' => $request->lkl,
            'layout' => $pathFileSurat1,
            'approval_layout' => $request->approval_layout,
            'anggaran_dana' => $pathFileSurat2,
            'vendor' => $request->vendor,
            'spk' => $request->spk,
            'pengerjaan_lapangan'=> $request->pengerjaan_lapangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        );
        renovasi::create($form_data);
        return redirect('Frmrenovasi')->with('success', 'Data Added successfully.');
    }
    public function showanggaran_dana($id)
    {
    $data = renovasi::find($id);
    //dd($data->path);
    return Storage::download($data->anggaran_dana);
    }

    public function showlayout($id)
    {
        $data = renovasi::find($id);
        //dd($data->path);
        return Storage::download($data->layout);
    }
    public function destroy_renovasi($id)
    {
        $data = renovasi::findOrFail($id);
        $data->delete();
        return redirect('Frmrenovasi')->with('success', 'Data is successfully deleted');
    }
    public function edit_renovasi($id)
    {
        $data = renovasi::findOrFail($id);
        return view('Renovasi.updateRenovasi', compact('data'));
    }
    public function update_renovasi(Request $request, $id)
    {
        //dd($request->all);
        $fileSurat = $request->file('layout');
        $fileSurat = $request->file('anggaran_dana');
        
        //Ini adalah path tempat file diupload.
        $renovasi = renovasi::find($id);

        //Hapus File
        $fileStorage = Storage::delete($renovasi->layout);
        $fileStorage = Storage::delete($renovasi->anggaran_dana);

        //Upload file lagi yaa
        $pathFileSurat = $fileSurat->store('public/files/renovasi');

        $form_data = array(
            'nosurat_permintaan' => $request->nosurat_permintaan,
            'lkl' => $request->lkl,
            'layout' => $pathFileSurat,
            'approval_layout' => $request->approval_layout,
            'anggaran_dana' => $pathFileSurat,
            'vendor' => $request->vendor,
            'spk' => $request->spk,
            'pengerjaan_lapangan'=> $request->pengerjaan_lapangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        );
  
        renovasi::whereId($id)->update($form_data);

        return redirect('Frmrenovasi')->with('success', 'Data is successfully updated');
    }

    ///////////////////////////////////////// DIVISI ////////////////////////////////////////
    
    public function DESC(Request $request) {
        $data = divisi::orderBy('status','DESC')->paginate(5);
        return view('Divisi.FrmDivisi', compact('data'));
    }
    
    public function ASC(Request $request) {
        $data = divisi::orderBy('status','ASC')->paginate(5);
        return view('Divisi.FrmDivisi', compact('data'));
    }
    public function indexDivisi(Request $request)
    {
        /*$data = divisi::paginate(5);
        return view('Divisi.FrmDivisi', compact('data'));*/
        $data = null;
        $cari = $request->get("cari");
        if ($cari == null) {
            $data = divisi::paginate(10);
        } else {
            $data = divisi::getdivisi($cari)->paginate(10);
        }
        return view('Divisi.FrmDivisi', compact('data', 'cari'));
    }

    public function cetak_pdfDivisi()
    {
    	$data = divisi::all();
 
    	$pdf = PDF::loadview('Divisi.pdf',['divisi'=>$data]);
    	return $pdf->download('laporan-divisi.pdf');
    }
    public function inputDivisi(Request $request) {
        return view('Divisi.insertDivisi');
    }
    public function storeDivisi(Request $request)
    {
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'tanggal_masuk'    =>  'required',
            'tanggal_keluar'    =>  'required'

        ]);
        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar
        );

        divisi::create($form_data);
        return redirect('FrmDivisiBRI')->with('success', 'Data Added successfully.');
    }

    public function editDivisi($id)
    {
        $data = divisi::findOrFail($id);
        return view('Divisi.updateDivisi', compact('data'));
    }
    public function updateDivisi(Request $request, $id)
    {
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'tanggal_masuk'    =>  'required',
            'tanggal_keluar'    =>  'required'

        ]);

        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar
        );
  
        divisi::whereId($id)->update($form_data);

        return redirect('FrmDivisiBRI')->with('success', 'Data is successfully updated');
    }

    public function destroyDivisi($id)
    {
        $data = divisi::findOrFail($id);
        $data->delete();
        return redirect('FrmDivisiBRI')->with('success', 'Data is successfully deleted');
    }

    ///////////////////////////////////////// Data Divisi ////////////////////////////////////////
    public function inputDataDivisi(Request $request) {
        return view('DataDivisi.insertDataDivisi');
    }
    
    public function indexDataDivisi()
    {
        $data = DataDivisi::paginate(5);
        return view('DataDivisi.FrmDataDivisi', compact('data'));
    }


    public function storeDataDivisi(Request $request)
    {
        $request->validate([
            'datadivisi'    =>  'required'
        ]);

        $form_data = array(
            'datadivisi' => $request->datadivisi
        );

        DataDivisi::create($form_data);
        return redirect('FrmDataDivisi')->with('success', 'Data Added successfully.');
    }
    public function editDataDivisi($id)
    {
        $data = DataDivisi::findOrFail($id);
        return view('DataDivisi.updateDataDivisi', compact('data'));
    }
    public function updateDataDivisi(Request $request, $id)
    {
        $request->validate([
            'datadivisi'    =>  'required'

        ]);

        $form_data = array(
            'datadivisi' => $request->datadivisi
        );
  
        DataDivisi::whereId($id)->update($form_data);

        return redirect('FrmDataDivisi')->with('success', 'Data is successfully updated');
    }

    public function destroyDataDivisi($id)
    {
        $data = DataDivisi::findOrFail($id);
        $data->delete();
        return redirect('FrmDataDivisi')->with('success', 'Data is successfully deleted');
    }

    ///////////////////////////////////////// USUL RENOVASI ////////////////////////////////////////
    public function indexusulrenovasi(Request $request) 
    {
        $dataUsulRenovasi = null;
        $cari = $request->get("cari");
        if ($cari == null) {
            $dataUsulRenovasi = usulrenovasi::paginate(10);
        } else {
            $dataUsulRenovasi = usulrenovasi::getusulrenovasi($cari)->paginate(10);
        }
        return view('UsulRenovasi.FrmUsulRenovasi', compact('dataUsulRenovasi', 'cari'));
        /*$dataUsulRenovasi = usulrenovasi::paginate(5);
        return view('UsulRenovasi.FrmUsulRenovasi', compact('dataUsulRenovasi'));*/
    }
    /*public function search(Request $request) 
    {
       $search=$request->get('search');
       $posts= DB::table('usul_renovasi')->where('divisi','like','%'.$search.'%')->paginate(5);
       return view('FrmUsulRenovasi',['usul_renovasi'=>$posts]);
    }*/

    public function DESCUsulRenovasi(Request $request) 
    {
        $dataUsulRenovasi = usulrenovasi::orderBy('status','DESC')->paginate(10);
        return view('UsulRenovasi.FrmUsulRenovasi', compact('dataUsulRenovasi'));
    }
    
    public function ASCUsulRenovasi(Request $request) {
        $dataUsulRenovasi = usulrenovasi::orderBy('status','ASC')->paginate(10);
        return view('UsulRenovasi.FrmUsulRenovasi', compact('dataUsulRenovasi'));
    }
    public function cetak_pdfUsulrenovasi()
    {
    	$dataUsulRenovasi = usulrenovasi::all();
 
    	$pdf = PDF::loadview('UsulRenovasi.pdf',['usulrenovasi'=>$dataUsulRenovasi]);
    	return $pdf->download('laporan-usulrenovasi.pdf');
    }
    public function inputusulrenovasi(Request $request) {
        return view('UsulRenovasi.insertUsulRenovasi');
    }
    public function storeusulrenovasi(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'kapasitas' =>  'required',
            'luas_ruangan' =>  'required',
            'tanggal_mulai'    =>  'required',
            'tanggal_selesai'    =>  'required'

        ]);
        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'kapasitas' => $request->kapasitas,
            'luas_ruangan' => $request->luas_ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        );

        usulrenovasi::create($form_data);
        return redirect('Frmusulrenovasi')->with('success', 'Data Added successfully.');
    }

    public function edit_usulrenovasi($id)
    {
        $dataUsulRenovasi = usulrenovasi::findOrFail($id);
        return view('UsulRenovasi.updateUsulRenovasi', compact('dataUsulRenovasi'));
    }
    public function update_usulrenovasi(Request $request, $id)
    {
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'kapasitas' =>  'required',
            'luas_ruangan' =>  'required',
            'tanggal_mulai'    =>  'required',
            'tanggal_selesai'    =>  'required'

        ]);
        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'kapasitas' => $request->kapasitas,
            'luas_ruangan' => $request->luas_ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        );
  
        usulrenovasi::whereId($id)->update($form_data);
        return redirect('Frmusulrenovasi')->with('success', 'Data is successfully updated');
    }

    public function destroy_usulrenovasi($id)
    {
        $data = usulrenovasi::findOrFail($id);
        $data->delete();
        return redirect('Frmusulrenovasi')->with('success', 'Data is successfully deleted');
    }

     //================================================= Usul Renovasi Item / ID ===================================================
    
     public function cetak_pdfBerkasUsulRenovasi()
    {
    	$dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::all();
 
    	$pdf = PDF::loadview('UsulRenovasi.UsulRenovasiItem.pdf',['ItemBerkasUsulRenovasi'=>$dataBerkasUsulRenovasi]);
    	return $pdf->download('laporan_Usul_Renovasi.pdf');
    }
     public function BerkasUsulRenovasi(Request $request, $id)
     {
        /*$dataUsulRenovasi = usulrenovasi::findOrFail($id);
        $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::paginate(5);
        return view('UsulRenovasi.UsulRenovasiItem.BerkasUsulRenovasi', compact('dataUsulRenovasi','dataBerkasUsulRenovasi'));*/
    
        $dataUsulRenovasi = usulrenovasi::findOrFail($id);
        $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::paginate(5);
        $dataBerkasUsulRenovasi = null;
        $cari = $request->get("cari");
        if ($cari == null) {
            $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::paginate(5);
        } else {
            $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::getberkas($cari)->paginate(5);
        }
        return view('UsulRenovasi.UsulRenovasiItem.BerkasUsulRenovasi', compact('dataUsulRenovasi', 'dataBerkasUsulRenovasi','cari'));


        }
     public function InputUsulRenovasiItem($id)
     {
         $dataUsulRenovasi = usulrenovasi::findOrFail($id);
         return view('UsulRenovasi.UsulRenovasiItem.InputBerkasUsulRenovasi', compact('dataUsulRenovasi'));
     }
     public function StoreUsulRenovasiItem(Request $request, $id)
     {    
         $dataUsulRenovasi = usulrenovasi::findOrFail($id);
         $fileSurat1 = $request->file('layout');
         $fileSurat2 = $request->file('anggaran_dana');
         //Ini adalah path tempat file diupload.
         $pathFileSurat1 = $fileSurat1->store('public/files/usul_renovasi');
         $pathFileSurat2 = $fileSurat2->store('public/files/usul_renovasi');
         $form_data = array(
            'IDUsulRenovasi' => $dataUsulRenovasi->id,
            'nosurat_permintaan' => $request->nosurat_permintaan,
            'lkl' => $request->lkl,
            'layout' => $pathFileSurat1,
            'approval_layout' => $request->approval_layout,
            'anggaran_dana' => $pathFileSurat2,
            'vendor' => $request->vendor,
            'spk' => $request->spk,
            'pengerjaan_lapangan'=> $request->pengerjaan_lapangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'PenanggungJawab' => $request->PenanggungJawab
         );
         ItemBerkasUsulRenovasi::create($form_data);
         return redirect('Frmusulrenovasi')->with('success', 'Data Added successfully.');
    }
    public function edit_usulrenovasiItem($id)
    {
        $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::findOrFail($id);
        return view('UsulRenovasi.UsulRenovasiItem.UpdateBerkasUsulRenovasi', compact('dataBerkasUsulRenovasi'));
    }
    public function update_usulrenovasiItem(Request $request, $id)
    {
        //dd($request->all);
        $fileSurat1 = $request->file('layout');
        $fileSurat2 = $request->file('anggaran_dana');
        
        //Ini adalah path tempat file diupload.
        $ItemBerkasUsulRenovasi = ItemBerkasUsulRenovasi::find($id);

        //Hapus File
        $fileStorage1 = Storage::delete($ItemBerkasUsulRenovasi->layout);
        $fileStorage2 = Storage::delete($ItemBerkasUsulRenovasi->anggaran_dana);

        //Upload file lagi yaa
        $pathFileSurat1 = $fileSurat1->store('public/files/renovasi');
        $pathFileSurat2 = $fileSurat2->store('public/files/renovasi');
        $form_data = array(
            'nosurat_permintaan' => $request->nosurat_permintaan,
            'lkl' => $request->lkl,
            'layout' => $pathFileSurat1,
            'approval_layout' => $request->approval_layout,
            'anggaran_dana' => $pathFileSurat2,
            'vendor' => $request->vendor,
            'spk' => $request->spk,
            'pengerjaan_lapangan'=> $request->pengerjaan_lapangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'PenanggungJawab' => $request->PenanggungJawab
        );
        ItemBerkasUsulRenovasi::whereId($id)->update($form_data);
        return redirect('Frmusulrenovasi')->with('success', 'Data is successfully updated');
    }    
    public function AnggaranDanaUsulRenovasiItem($id)
    {
        $dataBerkasUsulRenovasi = ItemBerkasUsulRenovasi::find($id);
        return Storage::download($dataBerkasUsulRenovasi->anggaran_dana);
    }
    
    //////////////////////////////////////////////////////// Gedung ///////////////////////////////////////////////////////
    public function inputGedung(Request $request){
        return view('Gedung.insertGedung');
    }
    
    public function indexGedung()
    {
        $data = Gedung::paginate(5);
        return view('Gedung.FrmGedung', compact('data'));
    }


    public function storeGedung(Request $request)
    {
        $request->validate([
            'gedung'    =>  'required'
        ]);

        $form_data = array(
            'gedung' => $request->gedung
        );
        Gedung::create($form_data);
        return redirect('FrmGedung')->with('success', 'Data Added successfully.');
    }
    public function editGedung($id)
    {
        $data = Gedung::findOrFail($id);
        return view('Gedung.updateGedung', compact('data'));
    }
    public function updateGedung(Request $request, $id)
    {
        $request->validate([
            'gedung'    =>  'required'
        ]);
        $form_data = array(
            'gedung' => $request->gedung
        );
        Gedung::whereId($id)->update($form_data);

        return redirect('FrmGedung')->with('success', 'Data is successfully updated');
    }
    public function destroyGedung($id)
    {
        $data = Gedung::findOrFail($id);
        $data->delete();
        return redirect('FrmGedung')->with('success', 'Data is successfully deleted');
    }

    ///////////////////////////////Lantai///////////////////////////////////////////////////////////////
    public function inputLantai(Request $request) {
        return view('Lantai.insertLantai');
    }
    
    public function indexLantai()
    {
        $data = Lantai::paginate(5);
        return view('Lantai.FrmLantai', compact('data'));
    }


    public function storeLantai(Request $request)
    {
        $request->validate([
            'lantai'    =>  'required'

        ]);

        $form_data = array(
            'lantai' => $request->lantai
        );

        Lantai::create($form_data);
        return redirect('FrmLantai')->with('success', 'Data Added successfully.');
    }
    public function editLantai($id)
    {
        $data = Lantai::findOrFail($id);
        return view('Lantai.updateLantai', compact('data'));
    }
    public function updateLantai(Request $request, $id)
    {
        $request->validate([
            'lantai'    =>  'required'

        ]);

        $form_data = array(
            'lantai' => $request->lantai
        );
  
        Lantai::whereId($id)->update($form_data);

        return redirect('FrmLantai')->with('success', 'Data is successfully updated');
    }

    public function destroyLantai($id)
    {
        $data = Lantai::findOrFail($id);
        $data->delete();
        return redirect('FrmLantai')->with('success', 'Data is successfully deleted');
    }



      ///////////////////////////////////////// Status ////////////////////////////////////////    
    public function indexStatus()
    {
        $data = Status::paginate(5);
        return view('Status.FrmStatus', compact('data'));
    }

    public function inputStatus(Request $request) {
        return view('Status.insertStatus');
    }
    public function storeStatus(Request $request)
    {
        $request->validate([
            'status'    =>  'required'
        ]);

        $form_data = array(
            'status' => $request->status
        );

        Status::create($form_data);
        return redirect('FrmStatus')->with('success', 'Data Added successfully.');
    }
    public function editStatus($id)
    {
        $data = Status::findOrFail($id);
        return view('Status.updateStatus', compact('data'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status'    =>  'required'
        ]);

        $form_data = array(
            'status' => $request->status
        );
  
        Status::whereId($id)->update($form_data);

        return redirect('FrmStatus')->with('success', 'Data is successfully updated');
    }

    public function destroyStatus($id)
    {
        $data = Status::findOrFail($id);
        $data->delete();
        return redirect('FrmStatus')->with('success', 'Data is successfully deleted');
    }

    ///////////////////////////////////////// Plotting ////////////////////////////////////////  

    public function indexPlotting()
    {
        $data = plotting::paginate(5);
        return view('Plotting.FrmPlotting', compact('data'));
    }
    public function DESCPlotting(Request $request) {
        $data = plotting::orderBy('status','DESC')->paginate(5);
        return view('Plotting.FrmPlotting', compact('data'));
    }
   
   public function ASCPlotting(Request $request) {
        $data = plotting::orderBy('status','ASC')->paginate(5);
        return view('Plotting.FrmPlotting', compact('data'));
   }
    public function inputPlotting(Request $request) {
        return view('Plotting.insertPlotting');
    }
    public function storePlotting(Request $request)
    {
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'rencana_divisi' => 'required',
            'tanggal_masuk'    =>  'required',
            'tanggal_keluar'    =>  'required'

        ]);
        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'rencana_divisi' => $request->rencana_divisi,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar
        );

        plotting::create($form_data);
        return redirect('FrmPlottingBRI')->with('success', 'Data Added successfully.');
    }

    public function editPlotting($id)
    {
        $data = plotting::findOrFail($id);
        return view('Plotting.updatePlotting', compact('data'));
    }
    public function updatePlotting(Request $request, $id)
    {
        $request->validate([
            'divisi'    =>  'required',
            'gedung'    =>  'required',
            'lantai'    =>  'required',
            'status'    =>  'required',
            'rencana_divisi' => 'required',
            'tanggal_masuk'    =>  'required',
            'tanggal_keluar'    =>  'required'

        ]);

        $form_data = array(
            'divisi' => $request->divisi,
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'rencana_divisi' => $request->rencana_divisi,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar
        );
  
        plotting::whereId($id)->update($form_data);

        return redirect('FrmPlottingBRI')->with('success', 'Data is successfully updated');
    }

    public function destroyPlotting($id)
    {
        $data = plotting::findOrFail($id);
        $data->delete();
        return redirect('FrmPlottingBRI')->with('success', 'Data is successfully deleted');
    }  
}
