@extends('MasterAdmin.MasterAdmin')
@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
    <h1 class="h3 mb-2 text-gray-800">Input Berkas Usul Renovasi</h1>
    
    <div class="table-responsive">
    <form method="post" action="{{ route('UsulRenovasiItem.input.post', $dataUsulRenovasi->id) }}"  enctype="multipart/form-data">
    @csrf

            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Surat Permintaan</label>
                <div class="col-sm">
                    <input class="form-control" name="nosurat_permintaan" rows="1" placeholder="Masukkan Nomer surat permintaan"></input>
                </div>                                                
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Izin Prinsip Kegiatan</label>
                <div class="col-sm">
                    <input class="form-control" name="lkl" rows="1" placeholder="Masukkan Nomer Izin Prinsip Kegiatan"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Upload layout</label>
                <div class="col-sm">
                    <div class="custom-file">
                        <input type="file" id="customFile" name="layout">
                    </div>  
                </div>                                   
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer Approval Layout</label>
                <div class="col-sm">
                    <input class="form-control" name="approval_layout" rows="2" placeholder="Nomer Approval Layout"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Anggaran Dana</label>
                <div class="col-sm">
                    <div class="custom-file">
                        <input type="file" id="customFile" name="anggaran_dana">
                    </div>  
                </div>                                   
            </div>   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Vendor</label>
                <div class="col-sm">
                    <input class="form-control" name="vendor" rows="4" placeholder="Masukkan Vendor"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Nomer SPK</label>
                <div class="col-sm">
                    <input class="form-control" name="spk" rows="5" placeholder="Masukkan Nomer Spk"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Progress Pengerjaan lapangan</label>
                <div class="col-sm">
                    <input class="form-control" name="pengerjaan_lapangan" rows="5" placeholder="Masukkan Progress Pengerjaan Lapangan"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm">
                    <input class="form-control" name="tanggal_mulai" type="date" rows="5" placeholder="Masukkan Tanggal Mulai"></input>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                <div class="col-sm">
                    <input class="form-control" name="tanggal_selesai" type="date" rows="5" placeholder="Masukkan Tanggal Selesai"></input>
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
                    <button type="submit" class="btn btn-danger float-right " style="margin-left:10px;" >Batal</button>                            
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>   
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection