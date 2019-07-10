<?php
namespace JetAPI;

class OrderRequest extends AbstractRequest {

	public function getOrders($status, $parameters = array()) {
		return $this->get('/'.$status, $parameters);
	}
	
	public function getOrder($orderId) {
		return $this->get('/withoutShipmentDetail/'.$orderId);
	}
	
	public function acknowledgeOrder($orderId, $data) {
		return $this->put('/'.$orderId.'/acknowledge', $data);
	}
	
	public function shipOrder($orderId, $data) {
		return $this->put('/'.$orderId.'/shipped', $data);
	}
	
	public function getEndpoint() {
		return '/orders';
	}

	protected function getResponse() {
		return 'JetAPI\OrderResponse';
	}
}