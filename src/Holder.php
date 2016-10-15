<?php namespace T20n\Holder;

use Intervention\Image\AbstractFont;
use Intervention\Image\ImageManager;

class Holder {

	public function make($height, $width, $color = 'ccc') {

		// validate
		$color  = ctype_xdigit($color) ? $color : 'ccc';
		$height = $height < 1 ? 1 : $height;
		$width  = $width < 1 ? 1 : $width;

		// set up proportions and adjustments
		$min  = $height > $width ? $width : $height;
		$rate = 3.5;
		$size = $min * .2;

		// params
		$text  = "{$height} x {$width}";
		$textX = ($width / 2) - ($size / $rate);
		$textY = ($height / 2) - ($size / $rate);

		// generate
		$image = (new ImageManager)->canvas($width, $height, $color);
		$image->text($text, $textX, $textY, function (AbstractFont $font) use ($size, $color) {
			$font->file(__DIR__ . '/../resources/alegreya-regular.ttf');
			$font->size($size);
			$font->color($this->invertColor($color));
			$font->align('center');
			$font->valign('top');
			$font->angle(45);
		});

		// response
		return $image;
	}

	private function invertColor($color) {

		$color = strlen($color) === 3 ? $color . $color : $color;

		$color = str_replace('#', '', $color);
		if (strlen($color) != 6) {
			return 'ccc';
		}
		$rgb = '';
		for ($x = 0; $x < 3; ++$x) {
			$c = 255 - hexdec(substr($color, (2 * $x), 2));
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0' . $c : $c;
		}

		return '#' . $rgb;
	}
}
