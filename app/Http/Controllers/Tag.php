<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tag extends Controller
{
	public function show(Tag $tag)
	{
		$blog = $tag->blog()->paginateg(6);
		return view('blog.index', compact('blog','tag'));
	}
}
