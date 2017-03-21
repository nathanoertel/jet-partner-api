<?php
namespace JetAPI\log;

interface Logger {
	
	public function log($message, $error = false);
}
?>