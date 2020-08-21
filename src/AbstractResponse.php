<?php
namespace JetAPI;

abstract class AbstractResponse {

	protected $data = null;

	protected $success = true;

	protected $error = null;

	protected $errorCode = null;

	protected $errorMessage = null;
	
	protected $count = 0;
	
	protected $offset = 0;
	
	protected $limit = 100;
	
	protected $response = null;
	
	protected $headers = array();

	public function isSuccess() {
		return $this->success;
	}

	public function getError() {
		return $this->error;
	}

	public function getErrorMessage() {
		return $this->errorMessage;
	}

	public function getErrorCode() {
		return $this->errorCode;
	}
	
	public function getPageCount() {
		return ceil($this->count/$this->limit);
	}
	
	public function getRawResponse() {
		return $this->response;
	}
	
	public function getHeader($key) {
		if(isset($this->headers[$key])) return $this->headers($key);
		else return null;
	}

	public function getResults() {
		return $this->data;
	}

	public function __construct($headers, $response, $method) {
		$this->response = $response;
		
		$headerArray = explode("\r\n", $headers);
		
		foreach($headerArray as $index => $header) {
			if(strpos($header, 'HTTP/1.1') === 0) {
				$this->headers['http_code'] = (integer)substr($header, 9, 3);
				$this->headers['http_message'] = substr($header, 13);
			} else if(!empty($header)) {
				list($key, $value) = explode(': ', $header);
				$this->headers[$key] = $value;
			}
		}
		
		if($this->headers['http_code'] >= 200 && $this->headers['http_code'] < 300) {
			$this->data = json_decode($response, true);
			switch($method) {
				case AbstractRequest::GET:
						break;
				case AbstractRequest::ADD:
					break;
				case AbstractRequest::PUT:
					break;
				case AbstractRequest::UPDATE:
					break;
				case AbstractRequest::DELETE:
					break;
			}
		} else {
			$this->success = false;
			$this->errorCode = $this->headers['http_code'];
			$this->error = $this->headers['http_message'];
			$this->errorMessage = $this->headers['http_message'];
			$this->data = json_decode($response, true);
		}
	}
}
?>