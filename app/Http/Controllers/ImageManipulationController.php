<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageManipulationController extends Controller
{
	private function readimage($imagepath){
		$ext = pathinfo($imagepath, PATHINFO_EXTENSION);

		switch ($ext) {
			case 'jpg':
				$im = imagecreatefromjpeg($imagepath);
				break;
			case 'bmp':
				$im = imagecreatefrombmp($imagepath);
				break;
			case 'png':
				$im = imagecreatefrompng($imagepath);
				break;
			default:
				# code...
				break;
		}

		return $im;
	}

	private function flipx($imagepath){

		$im = self::readimage($imagepath);
	    $width = imagesx($im);
		$height = imagesy($im);
		$flipped = self::readimage($imagepath);

		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($flipped, $width-$x, $y, $new );
		    } 
		}

		imagejpeg($flipped, $imagepath);
	
	}
	private function flipy($imagepath){
		
		$im = self::readimage($imagepath);
	    $width = imagesx($im);
		$height = imagesy($im);
		$flipped = self::readimage($imagepath);

		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($flipped, $x, $height-$y, $new );
		    } 
		}

		imagejpeg($flipped, $imagepath);

	}
	private function doubleflip($imagepath){
		
		$im = self::readimage($imagepath);
	    $width = imagesx($im);
		$height = imagesy($im);
		$flipped = self::readimage($imagepath);

		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($flipped, $width-$x, $height-$y, $new );
		    } 
		}

		imagejpeg($flipped, $imagepath);

	}

	private function darken($imagepath){

		$im = self::readimage($imagepath);
	    $width = imagesx($im);

		$height = imagesy($im);


		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $r-=20;
		        if ($r<0) {$r=0;}
		        $g-=20;
		        if ($g<0) {$g=0;}
		        $b-=20;
		        if ($b<0) {$b=0;}

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($im, $x, $y, $new );
		    } 
		}

		imagejpeg($im, $imagepath);
	}
	
	private function lighten($imagepath){

	    $im = self::readimage($imagepath);
	    $width = imagesx($im);

		$height = imagesy($im);


		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $r+=20;
		        if ($r>255) {$r=255;}
		        $g+=20;
		        if ($g>255) {$g=255;}
		        $b+=20;
		        if ($b>255) {$b=255;}

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($im, $x, $y, $new );
		    } 
		}

		imagejpeg($im, $imagepath);
	}

	private function rotateright($imagepath){
			
		$im = self::readimage($imagepath);
	    $width = imagesx($im);
		$height = imagesy($im);
		$flipped = imagecreatetruecolor($height,$width);


		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		      
		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($flipped, $height-$y, $x, $new );
		    } 
		}

		imagejpeg($flipped, $imagepath);
	}

	private function rotateleft($imagepath){
		
		$im = self::readimage($imagepath);
	    $width = imagesx($im);
		$height = imagesy($im);
		$flipped = imagecreatetruecolor($height,$width);


		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		      
		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($flipped, $y, $width-$x, $new );
		    } 
		}

		imagejpeg($flipped, $imagepath);
	}
	
	private function invert($imagepath){
		
		$im = self::readimage($imagepath);
	    $width = imagesx($im);

		$height = imagesy($im);


		for ($y = 0; $y < $height; $y++)
		{
		    for ($x = 0; $x < $width; $x++)
		    {
		        $rgb = imagecolorat($im, $x, $y);
		        $r = ($rgb >> 16) & 0xFF;
		        $g = ($rgb >> 8) & 0xFF;
		        $b = $rgb & 0xFF;

		        $r=255-$r;
		        if ($r<0) {$r=0;}
		        $g=255-$g;
		        if ($g<0) {$g=0;}
		        $b=255-$b;
		        if ($b<0) {$b=0;}

		        $new = imagecolorallocate($im,$r,$g,$b);

		        imagesetpixel($im, $x, $y, $new );
		    } 
		}

		imagejpeg($im, $imagepath);

	}










  	public function __invoke(){ 

  		$action = $_POST['action'];
  		$imagepath = $_POST['imagepath'];
		$p=1;

		if (!empty($_POST['opacity'])) {  $cle = $_POST['opacity'];  }
		if (!empty($_POST['height'])) {  $a = $_POST['height'];  }
		if (!empty($_POST['width'])) {  $b = $_POST['width'];  }

		
		switch ($action) {

			case 'flipx':
				self::flipx($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'flipy':
				self::flipy($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'doubleflip':
				self::doubleflip($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'rotateright':
				self::rotateright($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'rotateleft':
				self::rotateleft($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'invert':
				self::invert($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'darken':
				self::darken($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			case 'lighten':
				self::lighten($imagepath);
				return view('welcome')->with('p',$p)->with('imagepath',$imagepath);
				break;
			
			default:
				# code...
				break;
		}
	

	}

}
