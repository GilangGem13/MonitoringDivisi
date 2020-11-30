@extends('MasterAdmin.MasterAdmin')
@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Divisi</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <form method="post" action="{{ route('DivisiBRI.ubah.post',$data->id) }}"  enctype="multipart/form-data">
    @csrf   
            @php
                $DataDivisi = App\DataDivisi::all()
            @endphp
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm">
                    <select name="divisi" class="form-control select2" data-placeholder="Pilih Data Divisi" style="width: 100%;">
                    @foreach ($DataDivisi as $satuDivisi)
                        <option value="{{$satuDivisi->datadivisi}}">{{$satuDivisi->datadivisi}}</option>
                    @endforeach
                    </select>
                </div>                                                
            </div>
            @php
                $Gedung = App\Gedung::all()
            @endphp
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Gedung</label>
                <div class="col-sm">
                    <select name="gedung" class="form-control select2" data-placeholder="Pilih Unit Kerja" style="width: 100%;">
                    @foreach ($Gedung as $satuGedung)
                        <option value="{{$satuGedung->gedung}}">{{$satuGedung->gedung}}</option>
                    @endforeach
                    </select>
                </div>                                                
            </div>



            @php
                $Lantai = App\Lantai::all()
            @endphp
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Lantai</label>
                <div class="col-sm">
                    <select name="lantai" class="form-control select2" data-placeholder="Pilih Unit Kerja" style="width: 100%;">
                    @foreach ($Lantai as $satuLantai)
                        <option value="{{$satuLantai->lantai}}">{{$satuLantai->lantai}}</option>
                    @endforeach
                    </select>
                </div>                                                
            </div>
            @php
                $Status = App\Status::all()
            @endphp
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm">
                    <select name="status" class="form-control select2" data-placeholder="Pilih Status" style="width: 100%;">
                    @foreach ($Status as $satuStatus)
                        <option value="{{$satuStatus->status}}">{{$satuStatus->status}}</option>
                    @endforeach
                    </select>
                </div>                                                
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">tanggal_masuk</label>
                <input class="form-control" type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $data->tanggal_masuk) }}" rows="4" placeholder="Masukkan tanggal masuk"></input>
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">tanggal_keluar</label>
                <input class="form-control" type="date" name="tanggal_keluar" value="{{ old('tanggal_keluar', $data->tanggal_keluar) }}" rows="4" placeholder="Masukkan tanggal_keluar"></input>
            </div>
        <form  class="form-horizontal">         
            <div class="card-footer">
                <button type="submit" class="btn btn-danger float-right " style="margin-left:10px;" >Batal</button>                            
                <button type="submit" class="btn btn-primary float-right">Update</button>   
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
@endsection