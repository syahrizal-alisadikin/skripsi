<html>
<head>
	<title>Laporan Absen Perhari {{ $dosen->name }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Absen Perhari</h4>
		<h5>Tanggal {{ $start }}</h4>
		<h5>Dosen {{ $dosen->name }}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Matkul</th>
				<th>SKS</th>
				<th>Masuk</th>
				<th>Keluar</th>
				<th>Tanggal</th>
				<th>Keterangan</th>
				<th>Alasan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data_perhari as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->sks}}</td>
				<td>{{$p->created_at}}</td>
				<td>{{$p->updated_at}}</td>
				<td>{{$p->tanggal}}</td>
				<td>{{$p->keterangan}}</td>
				<td>{{$p->alesan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>