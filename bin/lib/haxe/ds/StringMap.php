<?php
/**
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;

/**
 * StringMap allows mapping of String keys to arbitrary values.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class StringMap implements IMap {
	/**
	 * @var array
	 */
	public $data;

	/**
	 * Creates a new StringMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:35: characters 10-32
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:35: characters 3-32
		$this->data = $this1;
	}
}

Boot::registerClass(StringMap::class, 'haxe.ds.StringMap');
