<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

	protected $table ="Posts";
	protected $primaryKey="id";

	protected $fillable=[
      	  'title',
	  'img_post',
	  'desc',
	  'resumo',
	  'img_destaque',





	]


}
