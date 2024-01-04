@extends('adminlte::page')
@section('title', 'Report Generate')
@section('content_header')
<h1 class="m-0 text-dark">&nbsp; Report Generate</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <link rel="stylesheet" href="/css/app.css">
                <div class="card-header">
                    <h4>Data Reservasi</h4> <a href="{{url('download-laporan-pdf')}}" target="_blank">
                    <button class="btn btn-peach"><i class="fa fa-file "></i> &nbsp; Buka PDF</button>
                </a>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('laporan') }}" class="form-inline">
                        <div class="form-group mb-2">
                            <label for="start" class="card-body">Tanggal Mulai:</label>
                            <input type="date" class="form-control" id="start" name="start" placeholder="Tanggal Mulai" value="{{ old('start') }}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="end" class="card-body">Tanggal Selesai:</label>
                            <input type="date" class="form-control" id="end" name="end" placeholder="Tanggal Selesai" value="{{ old('end') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="status" class="card-body">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="pesan">Pesan</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-peach mb-2"><i class="fa fa-filter "></i> &nbsp;Filter</button>
                    </form>

                    <div class="table-responsive">
                        <table id="laporan" class="table table-striped table-bordered table-hover">
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
                            <!-- <tfoot>
                                <tr>
                                    <td colspan="8"></td>
                                    <td>Rp {{ number_format($reservasi->sum('total_bayar')) }}</td>
                                    <td></td>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
        <script>
        $(document).ready(function() {
            $('table:not(#laporan)').DataTable();

            $('#laporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5',
                    'print'
                ],
                footer: true
            });
        });
    </script>
</div>

@endsection
