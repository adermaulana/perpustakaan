<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('dashboard.pengembalian.index', [
            'title' => 'Pengembalian',
            'peminjaman' => Peminjaman::all(),
        ]);
    }

    public function kembali(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = 'dikembalikan';

        $peminjaman->save();

        $buku = $peminjaman->buku;
        $buku->increment('stok');
        $buku->save();

        return redirect('dashboard/pengembalian');
    }

    public function hapus(Peminjaman $peminjaman)
    {
        Peminjaman::destroy($peminjaman->id);
        return redirect('dashboard/pengembalian');
    }
}
