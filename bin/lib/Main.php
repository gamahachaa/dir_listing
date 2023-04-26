<?php
/**
 */

use \php\Boot;
use \php\Lib;
use \haxe\Exception as HaxeException;
use \haxe\ds\StringMap;
use \sys\FileSystem;
use \haxe\format\JsonPrinter;
use \haxe\io\Path;

/**
 * ...
 * @author bb
 */
class Main {
	/**
	 * @param string $param
	 * 
	 * @return string
	 */
	public static function decodeDir ($param) {
		#src/Main.hx:67: characters 10-39
		return urldecode(\Std::string($param));
	}

	/**
	 * @param string $dir
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function fetchlist ($dir) {
		#src/Main.hx:73: characters 3-63
		return FileSystem::readDirectory(urldecode(\Std::string($dir)));
	}

	/**
	 * @param string[]|\Array_hx $list
	 * @param string $dir
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function hasQuizList ($list, $dir) {
		#src/Main.hx:77: characters 10-76
		$result = [];
		$data = $list->arr;
		$_g_current = 0;
		$_g_length = count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if (FileSystem::isDirectory(($dir??'null') . "/" . ($item??'null') . "/quiz")) {
				$result[] = $item;
			}
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * @return void
	 */
	public static function main () {
		#src/Main.hx:22: characters 3-65
		$params = Lib::hashOfAssociativeArray($_REQUEST);
		#src/Main.hx:23: characters 3-39
		$result = new StringMap();
		#src/Main.hx:24: characters 3-36
		$result->data["dir"] = new \Array_hx();
		#src/Main.hx:25: characters 3-52
		$result->data["status"] = "success";
		#src/Main.hx:28: lines 28-63
		try {
			#src/Main.hx:30: lines 30-53
			if (array_key_exists("directorytoread", $params->data)) {
				#src/Main.hx:32: characters 5-62
				$dir = urldecode(\Std::string(($params->data["directorytoread"] ?? null)));
				#src/Main.hx:35: characters 16-82
				$_this = Main::fetchlist($dir);
				$result1 = [];
				$data = $_this->arr;
				$_g_current = 0;
				$_g_length = count($data);
				$_g_data = $data;
				while ($_g_current < $_g_length) {
					$item = $_g_data[$_g_current++];
					if (FileSystem::isDirectory(($dir??'null') . "/" . ($item??'null'))) {
						$result1[] = $item;
					}
				}
				#src/Main.hx:35: characters 5-83
				$list = \Array_hx::wrap($result1);
				#src/Main.hx:36: lines 36-37
				if (array_key_exists("fullPath", $params->data)) {
					#src/Main.hx:37: characters 13-62
					$result1 = [];
					$data = $list->arr;
					$_g_current = 0;
					$_g_length = count($data);
					$_g_data = $data;
					while ($_g_current < $_g_length) {
						$item = $_g_data[$_g_current++];
						$result1[] = ((Path::addTrailingSlash($dir)??'null') . ($item??'null'));
					}
					$list = \Array_hx::wrap($result1);
				}
				#src/Main.hx:39: characters 5-40
				$result->data["dir"] = $list;
			} else if (array_key_exists("directorywithquiztoread", $params->data)) {
				#src/Main.hx:43: characters 5-72
				$dir = urldecode(\Std::string(($params->data["directorywithquiztoread"] ?? null)));
				#src/Main.hx:44: characters 16-127
				$_this = Main::fetchlist(($params->data["directorywithquiztoread"] ?? null));
				$result1 = [];
				$data = $_this->arr;
				$_g_current = 0;
				$_g_length = count($data);
				$_g_data = $data;
				while ($_g_current < $_g_length) {
					$item = $_g_data[$_g_current++];
					if (FileSystem::isDirectory(($dir??'null') . "/" . ($item??'null') . "/quiz")) {
						$result1[] = $item;
					}
				}
				#src/Main.hx:44: characters 5-128
				$list = \Array_hx::wrap($result1);
				#src/Main.hx:45: lines 45-46
				if (array_key_exists("fullPath", $params->data)) {
					#src/Main.hx:46: characters 20-69
					$result1 = [];
					$data = $list->arr;
					$_g_current = 0;
					$_g_length = count($data);
					$_g_data = $data;
					while ($_g_current < $_g_length) {
						$item = $_g_data[$_g_current++];
						$result1[] = ((Path::addTrailingSlash($dir)??'null') . ($item??'null'));
					}
					$list = \Array_hx::wrap($result1);
				}
				#src/Main.hx:47: characters 5-40
				$result->data["dir"] = $list;
			} else {
				#src/Main.hx:51: characters 5-53
				$result->data["status"] = "failed";
				#src/Main.hx:52: characters 5-47
				$result->data["msg"] = "dir not set";
			}
			#src/Main.hx:54: lines 54-57
			if (array_key_exists("test", $params->data)) {
				#src/Main.hx:56: characters 5-41
				$result->data["status"] = "tested";
			}
		} catch(\Throwable $_g) {
			#src/Main.hx:59: characters 10-11
			$e = HaxeException::caught($_g);
			#src/Main.hx:61: characters 4-52
			$result->data["status"] = "failed";
			#src/Main.hx:62: characters 4-42
			$value = $e->get_message();
			$result->data["msg"] = $value;
		}
		#src/Main.hx:64: characters 3-36
		echo(\Std::string(JsonPrinter::print($result, null, null)));
	}

	/**
	 * @return void
	 */
	public function __construct () {
	}
}

Boot::registerClass(Main::class, 'Main');
