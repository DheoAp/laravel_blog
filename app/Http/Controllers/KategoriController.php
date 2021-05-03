<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
	// menampilkan data sesuai kategori
	public function show(Kategori $kategori)
	{
		$blog = $kategori->blog()->paginate(8);
		return view('blog.index', compact('blog','kategori'));
	}
}
