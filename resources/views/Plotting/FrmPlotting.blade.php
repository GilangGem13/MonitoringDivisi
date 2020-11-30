@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Plotting</h1>
            <a class="btn btn-info float-center" href="{{ url('PlottingBRI/tambah') }}">Tambah Plotting</a>  
            <a class="btn btn-info float-center" href="{{ url('PlottingBRIDESC/DESC') }}">Descending</a>  
            <a class="btn btn-info float-center" href="{{ url('PlottingBRIASC/ASC') }}">Ascending</a>  
           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Plotting</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="10%">Divisi</th>
                    <th width="10%">Gedung</th>
                    <th width="10%">Lantai</th>
                    <th width="10%">Status</th>
                    <th width="15%">Rencana Divisi</th>
                    <th width="15%">Tanggal Masuk</th>
                    <th width="15%">Tanggal Keluar</th>
                    <th width="20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $plotting)
                        <tr>
                            <td>{{ $plotting->id }}</td>
                            <td>{{ $plotting->divisi }}</td>
                            <td>{{ $plotting->gedung }}</td>
                            <td>{{ $plotting->lantai }}</td>
                            <td>{{ $plotting->status}}</td>
                            <td>{{ $plotting->rencana_divisi }}</td>
                            <td>{{ $plotting->tanggal_masuk }}</td>
                            <td>{{ $plotting->tanggal_keluar }}</td>
                            <td>
                                <a href="{{ route('PlottingBRI.ubah', $plotting->id) }}" class="fa fa-edit">Update</a>
                                <a href="{{ route('destroy.PlottingBRI', $plotting->id) }}" method="get">
                                    @csrf
                                    @method('DELETE')
                                    <i class="fa fa-times"> Delete</i>
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