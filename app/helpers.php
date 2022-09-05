<?php 

if (! function_exists('class_time_format')) {
	function class_time_in_seconds($value)
	{
		$time = str_replace(['h', 'm'], ':', $value ?? '0h0m0s');
        $time = str_replace('s', '', $time);

        list($hour,$minute,$second) = array_pad(explode(':', $time), -3, '00');
        $seconds = $hour*3600 + $minute*60 + $second;

        return $seconds;
	}
}