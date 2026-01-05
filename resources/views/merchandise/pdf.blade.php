<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Merchandise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #ABD907;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #ABD907;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #ABD907;
            color: #000;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .no-img {
            width: 50px;
            height: 50px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            line-height: 50px;
            color: #999;
            font-size: 10px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
        .total {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-left: 4px solid #ABD907;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #ABD907;
            color: #000;
        }
        .badge-warning {
            background-color: #FFCC00;
            color: #000;
        }
        .badge-danger {
            background-color: #EF6B00;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN DATA MERCHANDISE</h1>
        <p>Animerch - Merchandise Event Management System</p>
        <p>Tanggal Cetak: {{ date('d F Y, H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="8%">Foto</th>
                <th width="12%">ID Barang</th>
                <th width="22%">Nama Barang</th>
                <th width="18%">Event</th>
                <th width="15%">Harga</th>
                <th width="10%">Stok</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalNilai = 0;
                $totalStok = 0;
            @endphp
            
            @foreach($merchandise as $index => $item)
                @php
                    $totalNilai += $item->harga * $item->stok;
                    $totalStok += $item->stok;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->gambar && file_exists(public_path('storage/merchandise/' . $item->gambar)))
                            <img src="{{ public_path('storage/merchandise/' . $item->gambar) }}" class="product-img" alt="Product">
                        @else
                            <span class="no-img">No Image</span>
                        @endif
                    </td>
                    <td>{{ $item->id_barang }}</td>
                    <td><strong>{{ $item->nama_barang }}</strong></td>
                    <td>{{ $item->event_terkait }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        @if($item->stok > 10)
                            <span class="badge badge-success">Tersedia</span>
                        @elseif($item->stok > 0)
                            <span class="badge badge-warning">Terbatas</span>
                        @else
                            <span class="badge badge-danger">Habis</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <strong>Ringkasan:</strong><br>
        Total Item: {{ $merchandise->count() }} jenis merchandise<br>
        Total Stok: {{ number_format($totalStok, 0, ',', '.') }} unit<br>
        Total Nilai Inventori: Rp {{ number_format($totalNilai, 0, ',', '.') }}
    </div>

    <div class="footer">
        <p>Dicetak oleh: {{ Auth::user()->name ?? 'System' }}</p>
        <p>© {{ date('Y') }} Animerch - All Rights Reserved</p>
    </div>
</body>
</html>
