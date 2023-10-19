<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;  

class ControllerBuku extends Controller
{
    
    public function index(){
        $data_buku = Buku::all();
        $no = 0;
        $total_harga = DB::table('buku')->sum('harga');
        $jumlah_buku = $data_buku->count();
        return view('buku.index', compact('data_buku', 'total_harga', 'no', 'jumlah_buku'));
    }
    public function search(Request $request) {
        $batas = 5;
        $cari = $request->kata; 
        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')
            ->orWhere('penulis', 'like', '%' . $cari . '%')
            ->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $total_harga = DB::table('buku')->sum('harga');
        $jumlah_buku = $data_buku->count();
    
        return view('buku.search', compact('data_buku', 'total_harga', 'no', 'jumlah_buku', 'cari'));
    }

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:150',
            'penulis' => 'required|string|max:150',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
        ], [
            'judul' => 'Judul Buku',
            'penulis' => 'Nama Penulis',
            'harga' => 'Harga Buku',
            'tgl_terbit' => 'Tanggal Terbit',
        ]);
        
        Buku::create($validatedData);
        
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Simpan');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $buku = Buku::find($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }
}