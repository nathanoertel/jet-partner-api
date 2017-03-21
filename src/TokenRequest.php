<?php
namespace JetAPI;

class TokenRequest extends AbstractRequest {

	public function getToken() {
		$this->post('', array(
			'user' => $this->config['user'],
			'pass' => $this->config['password']
		));
	}
	
	public function getEndpoint() {
		return '/token';
	}

	protected function getResponse() {
		return 'JetAPI\TokenResponse';
	}
}