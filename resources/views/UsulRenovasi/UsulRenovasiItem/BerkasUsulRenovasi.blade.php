@extends('MasterAdmin.MasterAdmin')
@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">DAFTAR ISI BERKAS Usul Renovasi</h1>
        <p class="text-red">ID: {{ $dataUsulRenovasi->id }}
        <br>Luas Ruangan: {{ $dataUsulRenovasi->luas_ruangan }}
        <br>Tanggal Mulai: {{ $dataUsulRenovasi->tanggal_mulai }}
        <br>Tanggal Selesai: {{ $dataUsulRenovasi->tanggal_selesai }}
        <br>Details:
            <span class="badge badge-secondary">Divisi: {{ $dataUsulRenovasi->divisi }}</span>
            <span class="badge badge-secondary">Gedung: {{ $dataUsulRenovasi->gedung }}</span>
            <span class="badge badge-secondary">Lantai: {{ $dataUsulRenovasi->lantai }}</span>
            <span class="badge badge-secondary">Status: {{ $dataUsulRenovasi->status }}</span>
            <span class="badge badge-secondary">Kapasitas: {{ $dataUsulRenovasi->kapasitas }}</span></p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('UsulRenovasiItem.input', $dataUsulRenovasi->id) }}" class="btn btn-primary">Input Berkas Renovasi</a>    
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">ID Usul Renovasi</th>
                        <th width="25%">No Surat Permintaan</th>
                        <th width="15%">LKL</th>
                        <th width="15%">Layout</th>
                        <th width="15%">Approval Layout</th>
                        <th width="15%">Anggaran Dana</th>
                        <th width="15%">Vendor</th>
                        <th width="15%">SPK</th>
                        <th width="15%">Pengerjaan Lapangan</th>
                        <th width="15%">Tanggal Mulai</th>
                        <th width="15%">Tanggal Selesai</th>
                        <th width="15%">Penanggung Jawab</th>
                        <th width="15%">Print</th>
                        <th width="15%">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBerkasUsulRenovasi as $ItemBerkasUsulRenovasi)
                        <tr>
                            <td>{{ $ItemBerkasUsulRenovasi->IDUsulRenovasi }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->nosurat_permintaan }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->lkl }}</td>
                            
                            <td>
                               <li class="d-flex justify-content-center">
                                    <a href="{{ route('downloadlayoutadmin', $ItemBerkasUsulRenovasi->id) }}" method="post" class="btn btn-default btn-sm">
                                        <i class="fa fa-download"></i> downloadlayout</a>
                                </li>
                            </td>
                            <td>{{ $ItemBerkasUsulRenovasi->approval_layout }}</td>
                           
                            <td>
                               <li class="d-flex justify-content-center">
                                    <a href="{{ route('downloadanggarandana', $ItemBerkasUsulRenovasi->id) }}" method="post" class="btn btn-default btn-sm">
                                        <i class="fa fa-download"></i> Anggaran Dana</a>
                                </li>
                            </td>
                            <td>{{ $ItemBerkasUsulRenovasi->vendor }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->spk }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->pengerjaan_lapangan }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->tanggal_mulai }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->tanggal_selesai }}</td>
                            <td>{{ $ItemBerkasUsulRenovasi->PenanggungJawab }}</td>
                            <td><a href="/laporanUsulRenovasiID/cetak_pdf" class="fa fa-print fa-2x"></a></td>
                            <td><a href="{{ route('UsulRenovasiItem.ubah', $ItemBerkasUsulRenovasi->id) }}" class="fa fa-edit fa-2x"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $dataBerkasUsulRenovasi->links() !!}
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection