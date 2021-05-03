<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	use HasFactory;
	protected $table = 'blog';
	protected $primaryKey = 'blog_id';
	protected $fillable  = ['judul','kategori_id','slug','penulis','body'];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class,'kategori_id');
	}

	public function tag()
		{
			return $this->belongsToMany(Tag::class,'blog_tag','blog_id','tag_id');
		}

}
