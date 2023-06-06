<?php
// session_start();

function console_log($message)
{
	if (DEBUG_MODE) {
		echo '<script>';
		echo 'console.log(' . json_encode($message) . ')';
		echo '</script>';
	}
}