<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class TagController extends Controller
{
	public function index()
	{
		$tag = Tag::orderBy('tag_id','DESC')->get();
		return view('blog.tag.index',compact('tag'));
	}

	// Menampilkan tag di blog
	public function show(Tag $tag)
	{
		$blog = $tag->blog()->paginate(6);
		return view('blog.index', compact('blog','tag'));
	}

	public function store(Request $request)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($request->nama);
		Tag::create($data);
		session()->flash('pesan', 'Tag Berhasil di  buat');
		return redirect('/tag');
	}

	public function alertDelete($slug)
	{
		$tag = Tag::where('slug',$slug)->first();
		return view('blog.tag.delete',compact('tag'));
	}
	public function delete(Tag $tag)
	{
		$tag->delete();
		session()->flash('pesan', 'Tag Berhasil di Hapus');
		return redirect('/tag');
	}
}
