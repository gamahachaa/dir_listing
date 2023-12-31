<?php
/**
 */

namespace sys;

use \php\Boot;

/**
 * This class provides information about files and directories.
 * If `null` is passed as a file path to any function in this class, the
 * result is unspecified, and may differ from target to target.
 * See `sys.io.File` for the complementary file API.
 */
class FileSystem {
	/**
	 * Returns `true` if the file or directory specified by `path` is a directory.
	 * If `path` is not a valid file system entry or if its destination is not
	 * accessible, an exception is thrown.
	 * 
	 * @param string $path
	 * 
	 * @return bool
	 */
	public static function isDirectory ($path) {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:94: characters 3-36
		\clearstatcache(true, $path);
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:95: characters 3-29
		return \is_dir($path);
	}

	/**
	 * Returns the names of all files and directories in the directory specified
	 * by `path`. `"."` and `".."` are not included in the output.
	 * If `path` does not denote a valid directory, an exception is thrown.
	 * 
	 * @param string $path
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function readDirectory ($path) {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:113: characters 3-17
		$list = new \Array_hx();
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:114: characters 3-34
		$dir = \opendir($path);
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:115: characters 3-12
		$file = null;
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:116: lines 116-120
		while (true) {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:116: characters 10-38
			$file = \readdir($dir);
			#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:116: lines 116-120
			if (!($file !== false)) {
				break;
			}
			#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:117: lines 117-119
			if (($file !== ".") && ($file !== "..")) {
				#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:118: characters 5-20
				$list->arr[$list->length++] = $file;
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:121: characters 3-23
		\closedir($dir);
		#C:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:122: characters 3-14
		return $list;
	}
}

Boot::registerClass(FileSystem::class, 'sys.FileSystem');
