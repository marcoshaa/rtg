namespace App\Libraries;

use Braspag\API\Cart;
use Braspag\API\Address;
use Braspag\API\CreditCard;
use Braspag\API\Credentials;
use Braspag\API\Customer;
use Braspag\API\FraudAnalysis;
use Braspag\API\Payment;
use Braspag\API\Product;
use Braspag\API\Sale;

class PaymentApi {

    private $endpoint;
    private $braspagmerchantid;
    private $braspagmerchantkey;

	public function __construct(){
		$this->endpoint = getenv('BrasPagEndPoint');
        $this->braspagmerchantid = getenv('BrasPagMerchantId');
        $this->braspagmerchantkey = getenv('BrasPagMerchantKey');
	} 

    public static function PaymentBrasPag(){

        return 'Passou no teste';

    }    

}    