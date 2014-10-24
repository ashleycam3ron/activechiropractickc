<?php
class RW_Meta_Box_Validate {
	function test($text) {
		if ($text == '') {
			return 'this is empty';
		}
		return $text;
	}
}
?>