@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <a class="btn btn-info float-center" href="{{ url('DataDivisi/tambah') }}">Tambah Data Divisi</a>  
           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Divisi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Nama Data Divisi</th>
                    <th width="10%">Update</th>
                    <th width="10%">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $DataDivisi)
                        <tr>
                            <td>{{ $DataDivisi->id }}</td>
                            <td>{{ $DataDivisi->datadivisi }}</td>
                            <td>
                                <a href="{{ route('DataDivisi.ubah', $DataDivisi->id) }}" class="fa fa-edit">Update</a>
                            </td>
                            <td>
                                <a href="{{ route('destroy.DataDivisi', $DataDivisi->id) }}" method="get">
                                @csrf
                                @method('DELETE')
                                <i  class="fa fa-times">Delete</i>
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