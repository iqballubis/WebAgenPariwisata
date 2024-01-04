<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #e9e9e9;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
<h1>Laporan Reservasi</h1>
<table id="tlaporan" class="table table-striped table-bordered table-hover">
    <thead class="thead-inverse">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Nama Paket</th>
            <th>Tanggal Reservasi</th>
            <th>Jumlah Peserta</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Nilai Diskon</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservasi as $key => $reservasi)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $reservasi->pelanggan->nama_pelanggan}}</td>
            <td>{{ $reservasi->daftar_paket->nama_paket }}</td>
            <td>{{ $reservasi->tgl_reservasi_wisata }}</td>
            <td>{{ $reservasi->jumlah_peserta }}</td>
            <td>Rp. {{ number_format($reservasi->harga) }}</td>
            <td>{{ $reservasi->diskon }} %</td>
            <td>Rp. {{ number_format($reservasi->nilai_diskon) }}</td>
            <td>Rp. {{ number_format($reservasi->total_bayar) }}</td>
            <td>
                {{ $reservasi->status_reservasi_wisata }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"></td>
            <td>Rp {{ number_format($reservasi->sum('total_bayar')) }}</td>
            <td></td>
        </tr>
    </tfoot>
</table>