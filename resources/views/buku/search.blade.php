@extends('layout.master')

@section('content')
    
    <div class="container mx-auto mt-10 p-4">
        <h1 class="text-3xl font-semibold text-center text-white mb-6 bg-green-700 shadow-md py-2">Daftar Buku</h1>
        <a href="{{ route('buku.create') }}" class="bg-blue-600 shadow-md hover:bg-blue-700 
        text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Buku</a>
        <div class="mt-4 shadow-md">
            <form action="{{ route('buku.search') }}" method="GET">
                @csrf
                <div class="flex items-center">
                    <input type="text" name="kata" class="border rounded-l py-2 px-3 w-full" placeholder="Cari judul atau penulis...">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded-r px-4 py-2">Cari</button>
                </div>
            </form>
        </div>

        @if (count($data_buku))
        <div class="alert alert-success">
            Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong>
        </div>
        @else
        <div class="alert alert-warning">
            <h4>Data {{ $cari }} tidak ditemukan</h4> <a href="/buku">Kembali ke Daftar Buku</a>
        </div>
        @endif
        <table class="w-full border-collapse border   bg-white shadow-md">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">No.</th>
                    <th class="px-4 py-2 border border-gray-300">Judul Buku</th>
                    <th class="px-4 py-2 border border-gray-300">Penulis</th>
                    <th class="px-4 py-2 border border-gray-300">Harga</th>
                    <th class="px-4 py-2 border border-gray-300">Tgl. Terbit</th>
                    <th class="px-4 py-2 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($data_buku as $buku)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{ ++$no }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->judul }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->penulis }}</td>
                    <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($buku->harga, 2) }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('buku.edit', $buku->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Apakah anda ingin menghapus buku?')" 
                            class="text-red-500 hover:text-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 p-4 bg-white shadow-md">
            <p class="text-lg">Jumlah buku yang tersedia: {{ $jumlah_buku }}</p>
            <p class="text-lg">Total harga dari seluruh buku: Rp {{ number_format($total_harga, 2) }}</p>
        </div>
    </div>
