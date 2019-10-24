<?php
namespace JetAPI;

class ErrorResponse extends AbstractResponse {

	public function __construct($errorCode, $error, $errorMessage) {
		$this->success = false;
		$this->errorCode = $errorCode;
		$this->error = $error;
		$this->errorMessage = $errorMessage;
	}
}
?>