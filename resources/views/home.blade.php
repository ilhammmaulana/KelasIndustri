@extends('layouts/main')

@section('container')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show w-50 m-auto" role="alert">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<section class="container-fluid mt-5" id="home">
	<h2 class="text-center mb-5">Mahasiswa</h2>
	<div class="container d-md-flex gap-4 justify-content-center">
		<div class="mb-3">
			@error('img')
				<p class="text-danger">Pastikan kamu mengirimkan gambar dan ukuran nya tidak lebi dari 1MB</p>
			@enderror
			@include('partials/form/form-add-data')
		</div>
		<table class="table-scroll w-100">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Gambar</th>
				<th scope="col">Nama Mahasiswa</th>
				<th scope="col">NIM</th>
				<th scope="col">Program Studi</th>
				<th scope="col">Semester</th>
				<th colspan="3" scope="col"> </th>
			</tr>
			<?php 
			$i = 0
			?>
			@foreach($list_mahasiswa as $mahasiswa)
			<?php $i++;
			$imgUrl = "storage/" . $mahasiswa->img;
			?>
			<tr>
				<td scope="col">{{ $i }}</td>
				<td scope="col" id="img-user">
					<img src="{{ url($imgUrl) }}" alt="Gambar">
				</td>
				<td scope="col">{{ $mahasiswa->name }}</td>
				<td scope="col">{{ $mahasiswa->nim }}</td>
				<td scope="col">{{ $mahasiswa->program_studi }}</td>
				<td scope="col">{{ $mahasiswa->semester }}</td>
				<td scope="col">
						@include('partials/form/form-edit-data')
				</td>
				<td scope="col">
						@include('partials/form/form-delete-data')
				</td>
				<td>
					<a href="{{ url('prev-mahasiswa/' . $mahasiswa->id) }}"><button class="btn btn-success" id="btn-show-mahasiswa">Detail Mahasiswaw</button></a>
				</td>
			</tr>
			@endforeach
		</thead>
		<tbody>
			
		</tbody>
		</table>
				</div>				
		</section>
		@endsection
