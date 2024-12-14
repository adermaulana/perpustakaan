<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('dashboard.peminjaman.index', [
            'title' => 'Peminjaman',
            'peminjaman' => Peminjaman::all(),
        ]);
    }

    public function tambah()
    {
        return view('dashboard.peminjaman.tambah', [
            'title' => 'Tambah Peminjaman',
            'anggota' => Anggota::all(),
            'buku' => Buku::all(),
        ]);
    }

    public function proses(Request $request)
    {
        $buku = Buku::findOrFail($request->id_buku);

        if ($buku && $buku->stok > 0) {

            $buku->stok -= 1;
            $buku->save();

            // Membuat entri peminjaman baru
            $peminjaman = new Peminjaman();

            $peminjaman->id_buku = $request->id_buku;
            $peminjaman->id_anggota = $request->id_anggota;
            $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
            $peminjaman->tanggal_kembali = $request->tanggal_kembali;
            $peminjaman->status = 'dipinjam';

            $peminjaman->save(); // Simpan peminjaman

            return redirect('dashboard/peminjaman');
        } else {
            return back()->with('error', 'Stok buku tidak cukup');
        }
    }
}
