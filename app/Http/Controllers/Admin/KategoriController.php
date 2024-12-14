<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   
    public function index()
    {
        return view('dashboard.kategori.index',[
            'title' => 'Kategori',
            'kategori' => Kategori::all()
        ]);
    }


    public function tambah()
    {
        return view('dashboard.kategori.tambah',[
            'title' => 'Tambah Kategori'
        ]);
    }


    public function proses(Request $request)
    {

        $kategori = new Kategori();

        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect('dashboard/buku/kategori');
    }


    public function edit(Kategori $kategori)
    {


        return view('dashboard.kategori.edit',[
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }


    public function update(Request $request, Kategori $kategori)
    {
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect('dashboard/buku/kategori');
    }


    public function hapus(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('dashboard/buku/kategori');
    }
}
