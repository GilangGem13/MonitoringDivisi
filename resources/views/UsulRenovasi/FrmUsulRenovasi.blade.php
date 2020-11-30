@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <a class="btn btn-info float-center" href="{{ url('usulrenovasi/tambah') }}">Tambah Usul Renovasi</a>  
            <!--<a class="btn btn-info float-center" href="{{ url('usulrenovasi/DESC') }}">Descending</a>  
            <a class="btn btn-info float-center" href="{{ url('usulrenovasi/ASC') }}">Ascending</a>  -->
            
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">     
            
            <h6 class="m-0 font-weight-bold text-primary">Data Usul Renovasi</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form method="GET" action="{{ route('Frmusulrenovasi') }}" class="float-right d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                    <th width="10%">Kapasitas</th>
                    <th width="10%">Luas Ruangan(m2)</th>
                    <th width="10%">Tanggal Mulai</th>
                    <th width="10%">Tanggal Selesai</th>
                    <th width="5%">Print</th>
                    <th width="10%">Renovasi</th>
                    <th width="20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dataUsulRenovasi as $usulrenovasi)
                        <tr>
                            <td>{{ $usulrenovasi->id }}</td>
                            <td>{{ $usulrenovasi->divisi }}</td>
                            <td>{{ $usulrenovasi->gedung }}</td>
                            <td>{{ $usulrenovasi->lantai }}</td>
                            <td>{{ $usulrenovasi->status}}</td>
                            <td>{{ $usulrenovasi->kapasitas}}</td>
                            <td>{{ $usulrenovasi->luas_ruangan}}</td>
                            <td>{{ $usulrenovasi->tanggal_mulai }}</td>
                            <td>{{ $usulrenovasi->tanggal_selesai }}</td>
                            <td><a href="/laporanUsulRenovasi/cetak_pdf" class="fa fa-print fa-2x"></a></td>
                            <td>
                                <a href="{{ route('BerkasUsulRenovasi', $usulrenovasi->id) }}" class="btn btn-primary">Input</a>    
                            </td>
                            <td>
                                <a href="{{ route('usulrenovasi.ubah', $usulrenovasi->id) }}" class="fa fa-edit"></a>
                                <a href="{{ route('destroy.usulrenovasi', $usulrenovasi->id) }}" method="get">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-times"></i>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {!! $dataUsulRenovasi->links() !!}
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection