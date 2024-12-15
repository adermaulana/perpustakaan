<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class KatalogController extends Controller
{

    public function katalog(Request $request)
    {
        $query = $request->input('query');
        $books = Buku::where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('penulis', 'LIKE', "%{$query}%")
                    ->paginate(9);

        return view('katalog', [
            'title' => 'Katalog',
            'active' => 'Katalog',
            'books' => $books
        ]);
    }

    public function detail(Buku $buku){
        
        return view('detail',[
            'title' => 'Detail Buku',
            'active' => 'Detail Buku',
            'book' => $buku
        ]);
    }

}
