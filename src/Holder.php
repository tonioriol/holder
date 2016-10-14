<?php namespace T20n\Holder;

use Intervention\Image\ImageManager;

class Holder {
	public function hold($height, $width, $color = '#ccc') {

		$min = $height > $width ? $width : $height;

		$mul  = 3.5;
		$size = $min * .2;


		return (new ImageManager)->canvas($width, $height, $color)
		                         ->text("{$height} x {$width}", ($width / 2) - ($size / $mul), ($height / 2) - ($size / $mul),
			                         function ($font) use ($size, $color) {
				                         $font->file(__DIR__ . '../resources/alegreya-regular.ttf');
				                         $font->size($size);
				                         $font->color($this->invertColor($color));
				                         $font->align('center');
				                         $font->valign('top');
				                         $font->angle(45);
			                         })
		                         ->response('png');
	}

	private function invertColor($color) {
		$color = str_replace('#', '', $color);
		if (strlen($color) != 6) {
			return '000000';
		}
		$rgb = '';
		for ($x = 0; $x < 3; $x++) {
			$c = 255 - hexdec(substr($color, (2 * $x), 2));
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0' . $c : $c;
		}

		return '#' . $rgb;

	}
}