<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Table</title>
</head>
<body>
    <div class="container mx-auto mt-10">
    <table class="w-full  text-left ">
        <thead class=" uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku)
            <tr>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>Rp {{ number_format($buku->harga, 2) }}</td>
                <td>{{ $buku->tgl_terbit}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-10">
        <p>Jumlah data yang dimiliki: {{ $data_buku->count() }}</p>
        <p>Total harga semua buku: Rp {{ number_format($total_harga, 2) }}</p>
    </div>
    
    </div>
</body>
</html>