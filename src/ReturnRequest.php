<?php
namespace JetAPI;

class ReturnRequest extends AbstractRequest {

	public function getReturns($status) {
		if(!in_array($status, array(
			'created',
			'inprogress',
			'completed by merchant'
		))) throw new InvalidArgumentException('status must be one of "created", "inprogress" or "completed by merchant", input was: '.$status);

		return $this->get('/'.$status);
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