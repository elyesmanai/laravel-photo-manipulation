<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

class UploadController extends Controller
{
  public function upload(){

		if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('uploads', $file->getClientOriginalName());
			$p=1;
			$imagepath='uploads/'.$file->getClientOriginalName();
			return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
		}

	}


}
