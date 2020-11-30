@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

           <a class="btn btn-info float-center" href="{{ url('Lantai/tambah') }}">Tambah Lantai</a>  
           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lantai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Lantai</th>
                    <th width="10%">Update</th>
                    <th width="10%">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $Lantai)
                        <tr>
                            <td>{{ $Lantai->id }}</td>
                            <td>{{ $Lantai->lantai }}</td>
                            <td>
                                <a href="{{ route('Lantai.ubah', $Lantai->id) }}" class="fa fa-edit">Update</a>
                            </td>
                            <td>
                                <a href="{{ route('destroy.Lantai', $Lantai->id) }}" method="get">
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