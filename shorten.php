<?php
/* Funkcja skraca wartość rozmiaru do największej możliwej jednostki.
$size - rozmiar, $magnitude - jednostka podanego rozmiaru (0 - B, 1-KB,2-MB itd.)
*/

	function shorten_size($size,$magnitude) {
		if ($size>=1024) {
			$size/=1024;
			$magnitude++;
			return shorten_size($size,$magnitude);
		}
		else {
			$size = round($size,2);
			switch ($magnitude) {
				case 0:
					return "$size B";
					break;

				case 1:
					return "$size KB";
					break;

				case 2:
					return "$size MB";
					break;

				case 3:
					return "$size GB";
					break;

				case 4:
					return "$size TB";
					break;
			
				default:
					$magnitude*=10;
					$size*=pov(2,$magnitude);
					return "$size B";
					break;
			}
		}
	}

	echo shorten_size(11264,2);
?>