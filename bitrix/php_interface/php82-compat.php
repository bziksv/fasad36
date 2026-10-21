<?php
/**
 * PHP 8.2 compatibility helpers for legacy Bitrix core (local/dev).
 */

// Removed in PHP 8.0 — Bitrix ExceptionHandler still references it.
if (!defined('ASSERT_QUIET_EVAL')) {
	define('ASSERT_QUIET_EVAL', 1);
}

if (!function_exists('each')) {
	function each(&$array)
	{
		$key = key($array);
		if ($key === null) {
			return false;
		}
		$value = current($array);
		next($array);
		return array(
			1 => $value,
			'value' => $value,
			0 => $key,
			'key' => $key,
		);
	}
}

if (!function_exists('create_function')) {
	function create_function($args, $code)
	{
		static $i = 0;
		$i++;
		$name = 'bx_cf_'.$i.'_'.substr(md5($args."\0".$code), 0, 16);
		if (!function_exists($name)) {
			eval('function '.$name.'('.$args.') { '.$code.' }');
		}
		return $name;
	}
}
