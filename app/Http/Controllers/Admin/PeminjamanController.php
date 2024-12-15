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
            'peminjaman' => Peminjaman::where('status', 'dipinjam')->get(),
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
            $peminjaman->tanggal_rencana_pengembalian = $request->tanggal_rencana_pengembalian;
            $peminjaman->status = 'dipinjam';

            $peminjaman->save(); // Simpan peminjaman

            return redirect('dashboard/peminjaman');
        } else {
            return back()->with('error', 'Stok buku tidak cukup');
        }
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('dashboard.peminjaman.edit', [
            'title' => 'Edit Peminjaman',
            'peminjaman' => $peminjaman,
            'anggota' => Anggota::all(),
            'buku' => Buku::all(),
        ]);
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_rencana_pengembalian = $request->tanggal_rencana_pengembalian;

        $peminjaman->save();

        return redirect('dashboard/peminjaman');
    }

    public function hapus(Peminjaman $peminjaman)
    {

        $buku = $peminjaman->buku;
        $buku->increment('stok');
        $buku->save();

        Peminjaman::destroy($peminjaman->id);
        return redirect('dashboard/peminjaman');
    }
}
