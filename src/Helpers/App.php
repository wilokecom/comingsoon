<?php


namespace Comingsoon\Helpers;


class App
{
	private static $aRepository = [];

	public static function bind($key, $value)
	{
		self::$aRepository[$key] = $value;
	}

	public static function get($key)
	{
		return array_key_exists($key, self::$aRepository) ? self::$aRepository[$key] : '';
	}
}