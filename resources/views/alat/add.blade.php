@extends('produk.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah alat</h5>

		<form method="post" action="{{ route('alat.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_alat" class="form-label">ID alat</label>
                <input type="text" class="form-control" id="id_alat" name="id_alat">
            </div>
			<div class="mb-3">
                <label for="nama_alat" class="form-label">Nama Alat</label>
                <input type="text" class="form-control" id="nama_alat" name="nama_alat">
            </div>
            <div class="mb-3">
                <label for="jenis_alat" class="form-label">Jenis Alat</label>
                <input type="text" class="form-control" id="jenis_alat" name="jenis_alat">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="id_produk" class="form-label">Id produk</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk">
            </div>
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">Id Pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop