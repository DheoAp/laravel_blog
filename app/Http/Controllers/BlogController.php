<?php

namespace App\Http\Controllers;

use App\Models\{Blog,Kategori};
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

	// Untuk validasi form
	public function validateRequest()
	{
		return request()->validate([
			'judul' => 'required|min:5|max:150',
			// 'kategori' => 'required',
			'penulis' => 'required',
			'body' => 'required'
		]);


	}


	public function index()
	{
		$blog = Blog::orderBy('blog_id','DESC')->paginate(8);
		return view('blog.index', compact('blog'));		
	}

	public function create()
	{
		return view('blog.create',[
			'blog'			=> new Blog(), 
			'kategori'  => Kategori::get(),
			]);
	}

	public function store(Request $request)
	{	
		$data = $this->validateRequest();
		$data = $request->all();
		$data['slug'] = Str::slug($request->judul);
		$data['kategori_id'] = request('kategori');

		Blog::create($data);
		$request->session()->flash('pesan', 'Blog Berhasil di Buat');
		return redirect('/blog');

	}

	public function show($slug)
	{
		$blog = Blog::where('slug',$slug)->first();
		if(!$blog){
			return 'Halaman tidak di temukan';
		}
		return view('blog.show',compact('blog'));
	}

	public function edit(Blog $blog)
	{
		return view('blog.edit',[
			'blog' => $blog, 
			'kategori' => Kategori::get(),
			]);
	}
	public function update(Request $request, Blog $blog)
	{
		$data = $this->validateRequest();
		$data = $request->all();
		$data['slug'] = Str::slug(request()->judul);
		$data['kategori_id'] = request('kategori');

		$blog->update($data);
		session()->flash('pesan', 'Blog Berhasil di Update');
		return redirect('/blog');
	}

	public function delete(Blog $blog)
	{
		$blog->delete();
		session()->flash('pesan', 'Blog Berhasil di Hapus');
		return redirect('/blog');
	}
}
