<?php 
namespace App\Repositories;

use App\Post;

class PostsRepository {
	
	public function all()
	{
		return Post::all();
	}
}