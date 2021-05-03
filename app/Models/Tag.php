<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	use HasFactory;
	protected $table = 'Tag';
	protected $fillable = ['nama','slug'];
	protected $primaryKey = 'tag_id';

	public function blog()
	{
		// belongsToMany(Blog::class,'table_pivot','foreign key','foreign key')
		return $this->belongsToMany(Blog::class,'blog_tag','blog_id','tag_id');
	}
}
