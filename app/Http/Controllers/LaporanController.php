<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        if ($request->start && $request->end && $request->status) {
            $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$request->start, $request->end])
                ->where('status_reservasi_wisata', $request->status)
                ->get();
        } elseif ($request->start && $request->end) {
            $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$request->start, $request->end])->get();
        } elseif ($request->status) {
            $reservasi = Reservasi::where('status_reservasi_wisata', $request->status)->get();
        } else {
            $reservasi = Reservasi::get();
        }
        return view('laporan', [
            'reservasi' => $reservasi,
        ]);
    }

    public function downloadpdf()
    {
        $reservasi = Reservasi::limit(20)->get();
        $pdf = PDF::loadView('laporan-pdf', compact('reservasi'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan-pdf');
    }

}
