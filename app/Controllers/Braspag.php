<?php

namespace App\Controllers;

use Braspag\API\Cart;
use Braspag\API\Address;
use Braspag\API\CreditCard;
use Braspag\API\Credentials;
use Braspag\API\Customer;
use Braspag\API\FraudAnalysis;
use Braspag\API\Payment;
use Braspag\API\Product;
use Braspag\API\Sale;

class Braspag extends BaseController
{

    public function index(){

        //$result = BraspagAPI::postSale();

        // Crie uma instância de Sale informando o ID do pedido na loja
        $sale = new Sale('2017051002');

        // Customer Address
        $address = (new Address())
            ->setStreet('Alameda Xingu')
            ->setNumber('512')
            ->setComplement('27 andar')
            ->setZipCode('12345987')
            ->setCity('São Paulo')
            ->setState('SP')
            ->setCountry('BR')
            ->setDistrict('Taquara');

        // Customer Address
        $deliveryaddress = (new Address())
            ->setStreet('Alameda Xingu')
            ->setNumber('512')
            ->setComplement('27 andar')
            ->setZipCode('12345987')
            ->setCity('São Paulo')
            ->setState('SP')
            ->setCountry('BR')
            ->setDistrict('Taquara'); 

        // Crie uma instância de Customer informando o nome do cliente
        $customer = (new Customer('Nome do Comprador'))
            ->setEmail('comprador@braspag.com.br')
            ->setIdentity('12345678910')
            ->setIdentityType('CPF')
            ->setBirthdate("1991-01-02")
            ->setPhone("5521976781114")
            ->setAddress($address)
            ->setDeliveryAddress($deliveryaddress);

        $sale->setCustomer($customer);

        // Produtos
        $products[] = (new Product())
            ->setName('Produto Teste')
            ->setSku('123')
            ->setQuantity(1)
            ->setUnitPrice(10000)
            ->setGiftCategory('Undefined')
            ->setHostHedge('Off')
            ->setNonSensicalHedge('off')
            ->setObscenitiesHedge('off')
            ->setPhoneHedge('off')
            ->setRisk('High')
            ->setTimeHedge('Normal')
            ->setType('Service')
            ->setVelocityHedge('High')
        ;

        $cart = new Cart($products);
        $fraudAnalysis = new FraudAnalysis(
            "074c1ee676ed4998ab66491013c565e2",
            10000,
            $cart,
            ['1' => 'Guest', '4' => 'Web']
        );

        // Crie uma instância de Payment informando o valor do pagamento sem separador de decimais
        $payment = $sale->payment(10000, 10);
        $payment->setProvider('Simulado');
        $payment->setCurrency('BRL');
        $payment->setCountry('BRA');
        $payment->setInterest('ByMerchant');
        $payment->setCapture(true);
        $payment->setAuthenticate(false);
        $payment->setRecurrent(false);
        $payment->setSoftDescriptor('');

        // Informa os dados de análise de fraude
        $payment->setFraudAnalysis($fraudAnalysis);

        // Crie uma instância de Credit Card utilizando os dados de teste
        // esses dados estão disponíveis no manual de integração
        $payment->creditCard("123", CreditCard::VISA)
            ->setExpirationDate("12/2022")
            ->setCardNumber("4551870000000181")
            ->setHolder("Teste Accept")
        ;

        // Credentials
        $credentials = (new Credentials())
            ->setCode('9999999')
            ->setKey('D8888888')
            ->setPassword('LOJA9999999')
            ->setUsername('#Braspag2018@NOMEDALOJA#')
            ->setSignature('001');

        $payment->setCredentials($credentials);      

        // set HTTP header
        //$headers = array('Content-Type: application/json','MerchantId'=>$this->braspagmerchantid,'MerchantKey'=>$this->braspagmerchantkey);
        $headers = ['Content-Type: application/json','MerchantId:fdb03642-889f-4227-9320-1c573579f8ee','MerchantKey:TFWPXXXJJOOUXPJVSFHYQVWKIXENYROOZQBFHKQC'];
        
        // Open connection
        $ch = curl_init('https://apisandbox.braspag.com.br/v2/sales/');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sale) );
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $body );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //echo json_encode($sale);

        // Execute request
        $result = json_decode(curl_exec($ch));

        echo '<pre>'; print_r($result);

        /*
        // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
        $braspag = Braspag::shared(Environment::sandbox(), true);

        $sale = $braspag->createSale($sale);

        echo '<pre>'; print_r($sale);

        // Com a venda criada na Braspag, já temos o ID do pagamento, TID e demais
        // dados retornados pela Braspag
        $payment = $sale->getPayment();
        */
        
    }

}    