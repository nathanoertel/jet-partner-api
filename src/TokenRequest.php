<?php
namespace JetAPI;

class TokenRequest extends AbstractRequest {

	public function getEndpoint() {
		return '/token';
	}

	protected function getResponse() {
		return 'JetAPI\TokenResponse';
	}
}