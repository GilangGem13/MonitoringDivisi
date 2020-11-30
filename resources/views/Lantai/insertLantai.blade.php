@extends('MasterAdmin.MasterAdmin')
@section ('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lantai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <form method="post" action="{{ route('Lantai.tambah.post') }}" class="form-horizontal" enctype="multipart/form-data" >
            @csrf   
            <div class="input-group col-sm offset-md-auto mb-4 mt-4">
                <label class="col-sm-2 col-form-label">Lantai</label>
                <div class="col-sm">
                    <input class="form-control" name="lantai" rows="1" placeholder="Masukkan Lantai"></input>
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