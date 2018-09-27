<?php

function update_pics($data)
{
	$ci =& get_instance();
	if (empty($data)) return;
	$ci->db->where("id", $data["id"]);
	$ci->db->update("pics", $data);

	return;
}

function make_thumb($src)
{
	$isize = @getimagesize($src);
	if (!$isize) return;

	$mime = $isize['mime'];
	$dir = explode("/", $src);
	$file = array_pop($dir);
	$dir = implode("/", $dir)."/";
	$thumb = explode(".", $file);
	$ext = array_pop($thumb);
	$suffix = "-thumb";
	$thumb = $dir.implode(".", $thumb).$suffix.".".$ext;

	$thumb_height = 300;
	$thumb_width = 300;

	list($width, $height) = getimagesize($src);


	if ($mime === "image/jpeg")
	{
		$im = imagecreatefromjpeg($src);
		$size = min(imagesx($im), imagesy($im));
		$x = 0;
		$y = 0;
		if ($height>$width)
		{
			//potrait
			$x = 0;
			$y = ($height-$width)/2;
		}
		else
		{
			//landscape
			$x = ($width-$height)/2;
			$y = 0;
		}
		$im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
		$new_thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		imagecopyresized($new_thumb, $im2, 0, 0, 0, 0, $thumb_width, $thumb_height, $size, $size);
		if ($im2 !== FALSE) {
		    imagejpeg( $new_thumb, $thumb );
		    imagedestroy($new_thumb);
		}
		imagedestroy($im);
	}
	if ($mime === "image/png")
	{
		$im = imagecreatefrompng($src);
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
		$new_thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		imagecopyresized($new_thumb, $im2, 0, 0, 0, 0, $thumb_width, $thumb_height, $size, $size);
		if ($im2 !== FALSE) {
		    imagepng($new_thumb, $thumb );
		    imagedestroy($im2);
		}
		imagedestroy($im);
	}
	if ($mime === "image/gif")
	{

		$im = imagecreatefromgif($src);
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
		$new_thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		imagecopyresized($new_thumb, $im2, 0, 0, 0, 0, $thumb_width, $thumb_height, $size, $size);
		if ($im2 !== FALSE) {
		    imagegif($new_thumb, $thumb );
		    imagedestroy($im2);
		}
		imagedestroy($im);
	}
}

function compress_image($src, $quality=50)
{
	$isize = @getimagesize($src);
	if (!$isize) return;

	$mime = $isize['mime'];
	$dir = explode("/", $src);
	$file = array_pop($dir);
	$dir = implode("/", $dir)."/";
	$thumb = explode(".", $file);
	$ext = array_pop($thumb);
	$suffix = "-compressed";
	// $thumb = $dir.implode(".", $thumb).$suffix.".".$ext;
	$thumb = $dir.implode(".", $thumb).".".$ext;

	list($width, $height) = getimagesize($src);

	if ($width>1000 || $height>1000){
		return;
	}

	if ($mime === "image/jpeg")
	{
		$im = imagecreatefromjpeg($src);

		$new_thumb = imagecreatetruecolor($width, $height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $width, $height, $width, $height);
		
		if ($im !== FALSE) {
		    imagejpeg( $new_thumb, $thumb , $quality);
		    imagedestroy($new_thumb);
		}
		
		imagedestroy($im);
	}
	if ($mime === "image/png")
	{
		$im = imagecreatefrompng($src);

		$new_thumb = imagecreatetruecolor($width, $height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $width, $height, $width, $height);
		if ($im !== FALSE) {
			$quality /= 10;
		    imagepng($new_thumb, $thumb , $quality);
		}
		imagedestroy($im);
	}
	if ($mime === "image/gif")
	{
		
		$im = imagecreatefromgif($src);

		$new_thumb = imagecreatetruecolor($width, $height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $width, $height, $width, $height);
		if ($im !== FALSE) {
		    imagegif($new_thumb, $thumb );
		}
		imagedestroy($im);
	}
}

function resize_image($src, $new_width=1000, $new_height=1000, $quality= 50)
{
	$isize = @getimagesize($src);
	if (!$isize) return;

	$mime = $isize['mime'];
	$dir = explode("/", $src);
	$file = array_pop($dir);
	$dir = implode("/", $dir)."/";
	$thumb = explode(".", $file);
	$ext = array_pop($thumb);
	$suffix = "-compressed";
	// $thumb = $dir.implode(".", $thumb).$suffix.".".$ext;
	$thumb = $dir.implode(".", $thumb).".".$ext;

	list($width, $height) = getimagesize($src);

	if ($width<1000 && $height<1000){
		return;
	}

	if ($mime === "image/jpeg")
	{
		$im = imagecreatefromjpeg($src);

		$new_thumb = imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		if ($im !== FALSE) {
		    imagejpeg( $new_thumb, $thumb , $quality);
		    imagedestroy($new_thumb);
		}
		
		imagedestroy($im);
	}
	if ($mime === "image/png")
	{
		$im = imagecreatefrompng($src);

		$new_thumb = imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		if ($im !== FALSE) {
			$quality /= 10;
		    imagepng($new_thumb, $thumb , $quality);
		}
		imagedestroy($im);
	}
	if ($mime === "image/gif")
	{
		
		$im = imagecreatefromgif($src);

		$new_thumb = imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($new_thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		if ($im !== FALSE) {
		    imagegif($new_thumb, $thumb );
		}
		imagedestroy($im);
	}
}
