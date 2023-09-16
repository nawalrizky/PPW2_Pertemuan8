<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;  
class ControllerBuku extends Controller
{
    
    public function index(){
        $data_buku = Buku::all();
        $total_harga = DB::table('buku')->sum('harga');
        return view('buku.index', compact('data_buku', 'total_harga'));
    }
}

