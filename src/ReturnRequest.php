<?php
namespace JetAPI;

class ReturnRequest extends AbstractRequest {

	public function getCreated() {
		return $this->get('/created');
	}
	
	public function getReturn($returnId) {
		return $this->get('/state/'.$returnId);
	}
	
	public function completeReturn($returnId, $data) {
		return $this->put('/'.$returnId.'/complete', $data);
	}
	
	public function getEndpoint() {
		return '/returns';
	}

	protected function getResponse() {
		return 'JetAPI\ReturnResponse';
	}
}