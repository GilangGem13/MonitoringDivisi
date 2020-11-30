@extends('MasterAdmin.MasterAdmin')
@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Usul Renovasi</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <form method="post" action="{{ route('usulrenovasi.ubah.post',$dataUsulRenovasi->id) }}"  enctype="multipart/form-data">
    @csrf   
    @php
                $datadivisi = App\datadivisi::all()
            @endphp
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm">
                    <select name="divisi" class="form-control select2" data-placeholder="Pilih divisi" style="width: 100%;">
                    @foreach ($datadivisi as $satudivisi)
                        <option value="{{$satudivisi->datadivisi}}">{{$satudivisi->datadivisi}}</option>
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
                    <select name="gedung" class="form-control select2" data-placeholder="Pilih Gedung" style="width: 100%;">
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
                    <select name="lantai" class="form-control select2" data-placeholder="Pilih Lantai" style="width: 100%;">
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
                <label class="col-sm-2 col-form-label">Kapasitas</label>
                <div class="col-sm">
                    <input class="form-control" name="kapasitas" value="{{ old('kapasitas', $dataUsulRenovasi->kapasitas) }}" rows="5" placeholder="Masukkan Kapasitas"></input>
                </div>                                                
            </div>

            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Luas Ruangan</label>
                <div class="col-sm">
                    <input class="form-control" name="luas_ruangan" value="{{ old('luas_ruangan', $dataUsulRenovasi->luas_ruangan) }}" rows="5" placeholder="Masukkan Luas Ruangan"></input>
                </div>                                                
            </div>

            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <input class="form-control" type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $dataUsulRenovasi->tanggal_mulai) }}" rows="4" placeholder="Masukkan tanggal mulai"></input>
            </div>
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                <input class="form-control" type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $dataUsulRenovasi->tanggal_selesai) }}" rows="4" placeholder="Masukkan tanggal selesai"></input>
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