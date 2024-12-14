<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;
use TCPDF;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('dashboard.anggota.index', [
            'title' => 'Anggota',
            'anggota' => Anggota::all(),
        ]);
    }

    public function cetakKartu($id)
    {
        $anggota = Anggota::findOrFail($id);

        // Buat PDF baru
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set dokumen
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nama Perpustakaan');
        $pdf->SetTitle('Kartu Anggota');
        $pdf->SetSubject('Kartu Anggota Perpustakaan');

        // Hapus header dan footer default
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Tambah halaman
        $pdf->AddPage('P', 'A4');

        // Konten PDF dengan desain yang lebih modern
        $html =
            '
        <style>
            .card {
                width: 350px;
                border: 2px solid #2c3e50;
                border-radius: 15px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                margin: 0 auto;
                font-family: Arial, sans-serif;
                background: linear-gradient(to bottom right, #f1f2f6, #ffffff);
            }
            .card-header {
                background-color: #3498db;
                color: white;
                text-align: center;
                padding: 10px;
                border-top-left-radius: 13px;
                border-top-right-radius: 13px;
            }
            .card-body {
                padding: 20px;
            }
            .card-body p {
                margin: 10px 0;
                color: #2c3e50;
            }
            .member-name {
                font-size: 18px;
                font-weight: bold;
                color: #2c3e50;
                margin-bottom: 15px;
            }
            .label {
                color: #7f8c8d;
                font-weight: bold;
            }
            .value {
                color: #2c3e50;
            }
        </style>
        <div class="card">
            <div class="card-header">
                <h2>Kartu Anggota Perpustakaan</h2>
            </div>
            <div class="card-body">
                <div class="member-name">' .
                htmlspecialchars($anggota->nama) .
                '</div>
                <p><span class="label">Nomor Anggota:</span> <span class="value">' .
                htmlspecialchars($anggota->nomor_anggota) .
                '</span></p>
                <p><span class="label">Telepon:</span> <span class="value">' .
                htmlspecialchars($anggota->telepon) .
                '</span></p>
                <p><span class="label">Alamat:</span> <span class="value">' .
                htmlspecialchars($anggota->alamat) .
                '</span></p>
                <p><span class="label">Tanggal Bergabung:</span> <span class="value">' .
                htmlspecialchars($anggota->tanggal_bergabung) .
                '</span></p>
            </div>
        </div>
        ';

        // Tulis konten HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Keluarkan PDF
        $pdf->Output('Kartu_Anggota_' . $anggota->nama . '.pdf', 'I');
    }

    public function tambah()
    {
        $lastMember = Anggota::latest('id')->first();
        $lastId = $lastMember ? $lastMember->id + 1 : 1;
        $nomor_anggota = 'PERPUS-' . date('Y') . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

        return view('dashboard.anggota.tambah', [
            'title' => 'Tambah Anggota',
            'nomor_anggota' => $nomor_anggota,
        ]);
    }

    public function proses(Request $request)
    {
        $anggota = new Anggota();

        $anggota->nomor_anggota = $request->nomor_anggota;
        $anggota->nama = $request->nama;
        $anggota->telepon = $request->telepon;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;
        $anggota->tanggal_bergabung = Carbon::now()->toDateString();

        $anggota->save();

        return redirect('dashboard/anggota');
    }

    public function edit(Anggota $anggota)
    {
        return view('dashboard.anggota.edit', [
            'title' => 'Edit Anggota',
            'anggota' => $anggota,
        ]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $anggota->nomor_anggota = $request->nomor_anggota;
        $anggota->nama = $request->nama;
        $anggota->telepon = $request->telepon;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;

        $anggota->save();

        return redirect('dashboard/anggota');
    }

    public function hapus(Anggota $anggota)
    {
        Anggota::destroy($anggota->id);
        return redirect('dashboard/anggota');
    }
}
