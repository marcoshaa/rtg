<?php

namespace App\Libraries;

class Uuid {

    private $uuidv4;

	public function __construct(){
		//$this->endpoint = getenv('omint.host');
	} 

    public static function getUuid(){

        $uuid = service('uuid');
        // will prepare UUID4 object
        $uuid4 = $uuid->uuid4();
        // will assign UUID4 as string
        $uuid4_string = $uuid4->toString();
        // will assign UUID4 as byte string
        //$byte_string = $uuid4->getBytes();
        
        return $uuid4_string;

    }
 

}

?>