<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlatController extends Controller
{
    public function index() {
        $datas = DB::select('select * from alat');

        return view('alat.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('alat.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_alat' => 'required',
            'nama_alat' => 'required',
            'jenis_alat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_produk' => 'required',
            'id_pembeli' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO alat(id_alat, nama_alat, jenis_alat, harga, stok, id_produk, id_pembeli) VALUES (:id_alat, :nama_alat, :jenis_alat, :harga, :stok, :id_produk, :id_pembeli)',
        [
            'id_alat' => $request->id_alat,
            'nama_alat' => $request->nama_alat,
            'jenis_alat' => $request->jenis_alat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_produk' => $request->id_produk,
            'id_pembeli' => $request->id_pembeli,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('alat')->where('id_alat', $id)->first();

        return view('alat.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_alat' => 'required',
            'nama_alat' => 'required',
            'jenis_alat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_produk' => 'required',
            'id_pembeli' => 'required',
        ]);

        DB::update('UPDATE alat SET id_alat = :id_alat, nama_alat = :nama_alat, jenis_alat = :jenis_alat, harga = :harga, stok = :stok, id_produk = :id_produk, id_pembeli = :id_pembeli WHERE id_alat = :id',
        [
            'id' => $id,
            'id_alat' => $request->id_alat, 
            'nama_alat' => $request->nama_alat,
            'jenis_alat' => $request->jenis_alat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_produk' => $request->id_produk,
            'id_pembeli' => $request->id_pembeli,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_alat' => $request->jenis_alat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM alat WHERE id_alat = :id_alat', ['id_alat' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_alat', $id)->delete();

        return redirect()->route('alat.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
