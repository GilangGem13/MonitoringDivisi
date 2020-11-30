@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
       
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
            <a class="btn btn-info float-center" href="{{ url('PengaturanFrmArsipVitalMRC/tambah') }}">Tambah Arsip Vital</a>  
           @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%">Kode Kop</th>
                    <th width="25%">Klasifikasi</th>
                    <th width="15%">NomorItem</th>
                    <th width="10%">Uraian</th>
                    <th width="15%">Tanggal</th>
                    <th width="10%">TingkatPerkembangan</th>
                    <th width="25%">Media</th>
                    <th width="15%">KondisiFisik</th>
                    <th width="10%">Jumlah</th>
                    <th width="15%">Keterangan</th>
                    <th width="10%">Upload</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ArsipVitalItem)
                        <tr>
                            <td>{{ $ArsipVitalItem->IDKop }}</td>
                            <td>{{ $ArsipVitalItem->Klasifikasi }}</td>
                            <td>{{ $ArsipVitalItem->NomorItem }}</td>
                            <td>{{ $ArsipVitalItem->Uraian }}</td>
                            <td>{{ $ArsipVitalItem->Tanggal }}</td>
                            <td>{{ $ArsipVitalItem->TingkatPerkembangan }}</td>
                            <td>{{ $ArsipVitalItem->Media }}</td>
                            <td>{{ $ArsipVitalItem->KondisiFisik }}</td>
                            <td>{{ $ArsipVitalItem->Jumlah }}</td>
                            <td>{{ $ArsipVitalItem->Keterangan }}</td>
                            <td>{{ $ArsipVitalItem->Upload }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    
    <!-- /.container-fluid -->
@endsection