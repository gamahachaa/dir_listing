<?php
/**
 */

namespace haxe\io;

use \php\Boot;
use \php\_Boot\HxString;

/**
 * This class provides a convenient way of working with paths. It supports the
 * common path formats:
 * - `directory1/directory2/filename.extension`
 * - `directory1\directory2\filename.extension`
 */
class Path {
	/**
	 * Adds a trailing slash to `path`, if it does not have one already.
	 * If the last slash in `path` is a backslash, a backslash is appended to
	 * `path`.
	 * If the last slash in `path` is a slash, or if no slash is found, a slash
	 * is appended to `path`. In particular, this applies to the empty String
	 * `""`.
	 * If `path` is `null`, the result is unspecified.
	 * 
	 * @param string $path
	 * 
	 * @return string
	 */
	public static function addTrailingSlash ($path) {
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:272: lines 272-273
		if (mb_strlen($path) === 0) {
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:273: characters 4-14
			return "/";
		}
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:274: characters 3-34
		$c1 = HxString::lastIndexOf($path, "/");
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:275: characters 3-35
		$c2 = HxString::lastIndexOf($path, "\\");
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:276: lines 276-286
		if ($c1 < $c2) {
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:277: lines 277-280
			if ($c2 !== (mb_strlen($path) - 1)) {
				#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:278: characters 5-16
				return ($path??'null') . "\\";
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:280: characters 5-9
				return $path;
			}
		} else if ($c1 !== (mb_strlen($path) - 1)) {
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:283: characters 5-15
			return ($path??'null') . "/";
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:285: characters 5-9
			return $path;
		}
	}
}

Boot::registerClass(Path::class, 'haxe.io.Path');
