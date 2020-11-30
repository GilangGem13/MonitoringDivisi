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
                                                <th>Kode Divisi</th>
												<th>Divisi</th>
												<th>Gedung</th>   
                                                <th>lantai</th>
												<th>status</th>  
                                                <th>Tanggal Masuk</th>
												<th>Tanggal Keluar</th>   
											</tr>
										</thead>
										<tbody>
											@php $i=1 @endphp
											@foreach ($divisi as $satudivisi)
											<tr>
                                                <td>{{ $satudivisi->id }}</td>
												<td>{{ $satudivisi->divisi }}</td>
												<td>{{ $satudivisi->gedung }}</td>
												<td>{{ $satudivisi->lantai }}</td>
												<td>{{ $satudivisi->status }}</td>
                                                <td>{{ $satudivisi->tanggal_masuk }}</td>
												<td>{{ $satudivisi->tanggal_keluar }}</td>
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
