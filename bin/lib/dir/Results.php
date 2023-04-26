<?php
/**
 */

namespace dir;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Results {
	/**
	 * @var string
	 */
	const DETAILS = "details";
	/**
	 * @var string
	 */
	const DIRECTORY = "dir";
	/**
	 * @var string
	 ********************************************
	 * /****************  VALUES ********************
	 ********************************************
	 */
	const FAILED_VALUE = "failed";
	/**
	 * @var string
	 */
	const MESSAGE = "msg";
	/**
	 * @var string
	 */
	const NATIVE = "native";
	/**
	 * @var string
	 */
	const STAGE = "stage";
	/**
	 * @var string
	 */
	const STATUS = "status";
	/**
	 * @var string
	 */
	const SUCCESS_VALUE = "success";

}

Boot::registerClass(Results::class, 'dir.Results');
