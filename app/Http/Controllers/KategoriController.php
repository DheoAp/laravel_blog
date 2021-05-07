<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class KategoriController extends Controller
{
	public function index()
	{
		$kategori = Kategori::orderBy('kategori_id','desc')->get();
		return view('blog.kategori.index', compact('kategori'));
	}

	public function store(Request	$request)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($request->nama);
		$data = Kategori::create($data);

		session()->flash('pesan', 'Kategori Berhasil di Tambah');
		return redirect('kategori/list');
	}

	// menampilkan data sesuai kategori pada show blog
	public function show(Kategori $kategori)
	{
		$blog = $kategori->blog()->paginate(8);
		return view('blog.index', compact('blog','kategori'));
	}

	public function edit(Kategori $kategori)
	{
		return view('blog.kategori.edit',compact('kategori'));
	}
	public function update(Request $request, Kategori $kategori)
	{
		$data = $request->all();
		$data['slug'] = Str::slug(request()->nama);

		$kategori->update($data);
		session()->flash('pesan', 'Kategori Berhasil di update');
		return redirect('/kategori/list');

	}

	public function alertDelete($slug)
	{
		$kategori = Kategori::where('slug',$slug)->first();
		return view('blog.kategori.delete', compact('kategori'));
	}

	public function delete(kategori $kategori)
	{
		$kategori->delete();
		session()->flash('pesan', 'Kategori Berhasil di Hapus');
		return redirect('/kategori/list');
	}

	
	
}
