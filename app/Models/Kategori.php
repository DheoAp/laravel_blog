<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	use HasFactory;
	protected $table = 'kategori';
	protected $fillable = ['nama','slug'];
	protected $primaryKey = 'kategori_id';
	
	public function blog()
	{
		// $this->hasMany(Blog::class,'foreign_key');
		return $this->hasMany(Blog::class,'kategori_id');
	}
}
