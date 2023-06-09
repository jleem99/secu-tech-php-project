<?php

spl_autoload_register(function ($class_name) {

	$class_incdir = array(
		"controllers/"
	);

	$class_name = str_replace("\\", "/", $class_name);

	foreach ($class_incdir as $dir) {
		$class_path = __DIR__ . "/../" . $dir . $class_name . ".php";

		if (file_exists($class_path)) {
			require_once $class_path;
			return;
		}
	}

	throw new Exception('Unable to autoload class: ' . $class_name);
});
