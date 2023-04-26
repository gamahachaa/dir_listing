<?php
/**
 */

namespace dir;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Params {
	/**
	 * @var string
	 */
	const DIRECTORY = "directorytoread";
	/**
	 * @var string
	 */
	const DIRECTORY_WITH_QUIZ = "directorywithquiztoread";
	/**
	 * @var string
	 */
	const FULL_PATH = "fullPath";

}

Boot::registerClass(Params::class, 'dir.Params');
