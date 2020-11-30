@extends('MasterAdmin.MasterAdmin')
@section ('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Gedung</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <form method="post" action="{{ route('Gedung.tambah.post') }}" class="form-horizontal" enctype="multipart/form-data" >
            @csrf   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Gedung</label>
                <div class="col-sm">
                    <input class="form-control" name="gedung" rows="1" placeholder="Masukkan Gedung"></input>
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