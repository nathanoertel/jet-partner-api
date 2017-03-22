<?php
namespace JetAPI;

class TaxonomyRequest extends AbstractRequest {

	public function getTaxonomies($parent, $offset, $limit) {
		return $this->get('/links/'.$parent, array(
			'offset' => $offset,
			'limit' => $limit
		));
	}
	
	public function getTaxonomy($node) {
		return $this->get('/nodes/'.$node);
	}
	
	public function getAttributes($node) {
		return $this->get('/nodes/'.$node.'/attributes');
	}

	public function getEndpoint() {
		return '/taxonomy';
	}

	protected function getResponse() {
		return 'JetAPI\TaxonomyResponse';
	}
}