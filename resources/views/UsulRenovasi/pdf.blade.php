<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
			width:100%;
			}
			table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			}
			th, td {
			padding: 15px;
			text-align: left;
			}
			#t01 tr:nth-child(even) {
			background-color: #eee;
			}
			#t01 tr:nth-child(odd) {
			background-color: #fff;
			}
			#t01 th {
			background-color: black;
			color: white;
			}
		</style>
	</head>
	<body class="hold-transition layout-top-nav">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-20">
							<div class="card card-primary card-outline">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Divisi</th>
												<th>Gedung</th>   
                                                <th>Lantai</th>
												<th>Status</th>  
                                                <th>Kapasitas</th>
												<th>Luas ruangan</th>  
                                                <th>Tanggal Mulai</th>
												<th>Tanggal Selesai</th>   
											</tr>
										</thead>
										<tbody>
											@php $i=1 @endphp
											@foreach ($usulrenovasi as $satuusulrenovasi)
											<tr>
												<td>{{ $satuusulrenovasi->divisi }}</td>
												<td>{{ $satuusulrenovasi->gedung }}</td>
												<td>{{ $satuusulrenovasi->lantai }}</td>
                                                <td>{{ $satuusulrenovasi->status }}</td>
                                                <td>{{ $satuusulrenovasi->kapasitas }}</td>
                                                <td>{{ $satuusulrenovasi->luas_ruangan }}</td>
                                                <td>{{ $satuusulrenovasi->tanggal_mulai }}</td>
												<td>{{ $satuusulrenovasi->tanggal_selesai }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div><!-- /.card body -->
							</div>
						</div>
						<!-- /.col-md-12 -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
		</div>
	</body>
</html>
