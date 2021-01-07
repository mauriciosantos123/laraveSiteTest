<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

	public function index (){
	   $data = array();
	   return view('post.index');

	}

	public function create(){




	}
	public  function  store(Request $request){



	}


	public function edit(){


	}



	public function update(){


	}

	public function destroy(){




	}

}
