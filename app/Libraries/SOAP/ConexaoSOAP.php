<?php
class WsSOAP {
	private $client;
	
	public function __construct( $args = NULL ) {
		if( $args === NULL ){
			$args = array(
				'uri'=>'http://aguia04new/newsot-homolog/',
				'location'=>'http://aguia04new/newsot-homolog/awssot.aspx'
			);
		}
		$this->setClient( $args );
	}
	
	public  function setClient( $args ) {
		$this->client = new SoapClient($args['location'].'?wsdl'
			,array(
				'location' => $args['location'], 
				'uri'      => $args['uri']
			)
		);
	}
	
	public  function getClient() {
		return $this->client;
	}
}
?>