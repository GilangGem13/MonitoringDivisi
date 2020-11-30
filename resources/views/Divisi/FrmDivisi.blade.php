@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <a class="btn btn-info float-center" href="{{ url('DivisiBRI/tambah') }}">Tambah Divisi</a>  
            <a class="btn btn-info float-center" href="{{ url('DivisiBRIDESC/DESC') }}">Descending</a>  
            <a class="btn btn-info float-center" href="{{ url('DivisiBRIASC/ASC') }}">Ascending</a>  
           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Divisi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="GET" action="{{ route('FrmDivisiBRI') }}" class="float-right d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for... ENTER" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </form>
            <table class="table table-hover" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">Divisi</th>
                    <th width="10%">Gedung</th>
                    <th width="10%">Lantai</th>
                    <th width="10%">Status</th>
                    <th width="15%">Tanggal Masuk</th>
                    <th width="15%">Tanggal Keluar</th>
                    <th width="10%">Print</th>
                    <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $divisi)
                        <tr>
                            <td>{{ $divisi->id }}</td>
                            <td>{{ $divisi->divisi }}</td>
                            <td>{{ $divisi->gedung }}</td>
                            <td>{{ $divisi->lantai }}</td>
                            <td>{{ $divisi->status}}</td>
                            <td>{{ $divisi->tanggal_masuk }}</td>
                            <td>{{ $divisi->tanggal_keluar }}</td>
                            <td><a href="/laporanDivisi/cetak_pdf" class="fa fa-print">Print</a></td>
                            <td>
                                <a href="{{ route('DivisiBRI.ubah', $divisi->id) }}" class="fa fa-edit">Update</a>
                                <a href="{{ route('destroy.DivisiBRI', $divisi->id) }}" method="get">
                                    @csrf
                                    @method('DELETE')
                                    <i class="fa fa-times">Delete</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->links() !!}
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection