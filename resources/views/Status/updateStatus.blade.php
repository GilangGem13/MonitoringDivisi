@extends('MasterAdmin.MasterAdmin')
@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Status</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <form method="post" action="{{ route('renovasi.ubah.post',$data->id) }}"  enctype="multipart/form-data">
    @csrf   

            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm">
                    <input class="form-control" name="status" value="{{ old('status', $data->status) }}" rows="1" placeholder="Masukkan No.Surat Permintaan"></input>
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