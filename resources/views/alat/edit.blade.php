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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Alat</h5>

		<form method="post" action="{{ route('alat.update', $data->id_alat) }}">
			@csrf
            <div class="mb-3">
                <label for="id_alat" class="form-label">ID Alat</label>
                <input type="text" class="form-control" id="id_alat" name="id_alat" value="{{ $data->id_alat }}">
            </div>
			<div class="mb-3">
                <label for="nama_alat" class="form-label">nama_alat</label>
                <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ $data->nama_alat }}">
            </div>
            <div class="mb-3">
                <label for="jenis_alat" class="form-label">jenis_alat</label>
                <input type="text" class="form-control" id="jenis_alat" name="jenis_alat" value="{{ $data->jenis_alat }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">
            </div> 
            <div class="mb-3">
                <label for="id_produk" class="form-label">id_produk</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk" value="{{ $data->id_produk }}">
            </div> 
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">id_pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="{{ $data->id_pembeli }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop