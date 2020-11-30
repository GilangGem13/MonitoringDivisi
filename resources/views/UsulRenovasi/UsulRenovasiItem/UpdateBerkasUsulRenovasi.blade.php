@extends('MasterAdmin.MasterAdmin')
@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
    <h1 class="h3 mb-2 text-gray-800">Update Berkas Usul Renovasi</h1>
    
    <div class="table-responsive">
    <form method="post" action="{{ route('UsulRenovasiItem.ubah.post',$dataBerkasUsulRenovasi->id) }}"  enctype="multipart/form-data">
    @csrf

            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Surat Permintaan</label>
                <div class="col-sm">
                    <input class="form-control" name="nosurat_permintaan" value="{{ old('nosurat_permintaan', $dataBerkasUsulRenovasi->nosurat_permintaan) }}" rows="1" placeholder="Masukkan nosurat_permintaan"></input>
                </div>                                                
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Izin Prinsip Kegiatan</label>
                <div class="col-sm">
                    <input class="form-control" name="lkl" rows="1" value="{{ old('lkl', $dataBerkasUsulRenovasi->lkl) }}" placeholder="Masukkan lkl"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Upload layout</label>
                <div class="col-sm">
                    <div class="custom-file">
                        <input type="file" id="customFile" name="layout" value="{{ old('layout', $dataBerkasUsulRenovasi->layout) }}">
                    </div>  
                </div>                                   
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Approval Layout</label>
                <div class="col-sm">
                    <input class="form-control" name="approval_layout" value="{{ old('approval_layout', $dataBerkasUsulRenovasi->approval_layout) }}" rows="2" placeholder="Masukkan Nomer Approval Layout"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Anggaran Dana</label>
                <div class="col-sm">
                    <div class="custom-file">
                        <input type="file" id="customFile" name="anggaran_dana" value="{{ old('anggaran_dana', $dataBerkasUsulRenovasi->anggaran_dana) }}">
                    </div>  
                </div>                                   
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Vendor</label>
                <div class="col-sm">
                    <input class="form-control" name="vendor" rows="4" value="{{ old('vendor', $dataBerkasUsulRenovasi->vendor) }}" placeholder="Masukkan Vendor"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer SPK</label>
                <div class="col-sm">
                    <input class="form-control" name="spk" rows="5" value="{{ old('spk', $dataBerkasUsulRenovasi->spk) }}"  placeholder="Masukkan Spk"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Progress Pengerjaan lapangan</label>
                <div class="col-sm">
                    <input class="form-control" type="number" name="pengerjaan_lapangan" value="{{ old('pengerjaan_lapangan', $dataBerkasUsulRenovasi->pengerjaan_lapangan) }}" rows="5" placeholder="Masukkan Pengerjaan Lapangan"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm">
                    <input class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai', $dataBerkasUsulRenovasi->tanggal_mulai) }}" type="date" rows="5" placeholder="Masukkan Tanggal Mulai"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                <div class="col-sm">
                    <input class="form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai', $dataBerkasUsulRenovasi->tanggal_selesai) }}" type="date" rows="5" placeholder="Masukkan Tanggal Selesai"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                <div class="col-sm">
                    <input class="form-control" name="PenanggungJawab" type="text" rows="5" value="{{ Auth::user()->name }}" readonly></input>
                </div>                                                
            </div>
            <form  class="form-horizontal">         
                <div class="card-footer">                         
                    <button type="submit" class="btn btn-primary float-right">Update</button>   
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection