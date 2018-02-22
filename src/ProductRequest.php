<?php
namespace JetAPI;

class ProductRequest extends AbstractRequest {

	public function uploadSKU($sku, $productData) {
		return $this->put('/'.$sku, $productData);
	}
	
	public function uploadVariations($sku, $variationData) {
		return $this->put('/'.$sku.'/variation', $variationData);
	}
	
	public function updatePrice($sku, $price) {
		return $this->put('/'.$sku.'/price', array(
			'price' => (float)number_format($price, 2)
		));
	}
	
	public function updateInventory($sku, $fulfillmentNodes) {
		return $this->patch('/'.$sku.'/inventory', array(
			'fulfillment_nodes' => $fulfillmentNodes
		));
	}
	
	public function archiveSKU($sku) {
		return $this->put('/'.$sku.'/status/archive', array(
			'is_archived' => true
		));
	}
	
	public function unarchiveSKU($sku) {
		return $this->put('/'.$sku.'/status/archive', array(
			'is_archived' => false
		));
	}

	public function getEndpoint() {
		return '/merchant-skus';
	}

	protected function getResponse() {
		return 'JetAPI\ProductResponse';
	}
}