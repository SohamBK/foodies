<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//include("./lib/config_paytm.php");

class OrderProductControllerer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        //
    }

    public function addcart(Request $request)
    {        
        if($request->dish_id and $request->qut)
        {
            $cart = $request->session()->get('cart');
 
            $cart[$request->dish_id]["quantity"] = $request->qut;
 
            $request->session()->put('cart', $cart);
        }

        return $cart;
    }

    public function placeorder($flag)
    {
				$cart =  session()->get('cart');

				// echo "<pre>";
				// print_r($cart[23]['quantity']);
				// exit;
				
				$address = session()->get('addressid');

        $order = new \App\Order();
				$order->user_id = Auth::user()->id;
				$order->address_id = $address['addressid'];
				$order->status = 10;
				$order->save();
				
				// unset($address);

        $tp = 0;
        foreach($cart as $k => $v)
        {
            $cart_product = \App\Dish::find($k);
            $op = new \App\OrderProduct();
            $op->order_id = $order->id;
            $op->dish_id = $cart_product->id;
						$op->price = $cart_product->price;
						$op->qty = $v['quantity'];
						$op->save();
						
						$order->rest_id = $cart_product->restaurent->id;
						$order->save();

            $tp += ($op->price * $op->qty);
        }

        $order->price = (($tp * 0.05)+$tp);
        if($order->save())
        {
					session()->forget('cart');

					session()->forget('addressid');

						if($flag == 2){

							$this->configPaytm();
            
							$checkSum = "";
							$paramList = array();
	
							$INDUSTRY_TYPE_ID = 'Retail';
							$CHANNEL_ID = "WEB";
	
							$paramList["MID"] = PAYTM_MERCHANT_MID;
							$paramList["ORDER_ID"] = $order->id;
							$paramList["CUST_ID"] = Auth::user()->id;
							$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
							$paramList["CHANNEL_ID"] = $CHANNEL_ID;
							$paramList["TXN_AMOUNT"] = $order->price;
							$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
							$paramList["CALLBACK_URL"] = "http://foodies.com/order/".$order->id;
	
							$checkSum = $this->getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	
							return view('order_payment.redirect',['checkSum'=>$checkSum,'paramList'=>$paramList]);

						}else{
							return redirect('/member');
						}
        }
		}
		
		public function saveAddress(Request $request)
		{
			$address = new \App\Address();
			$address->address = $request['address'];
			$address->city_id = $request['cityid'];
			$address->area_id = $request['areaid'];
			$address->zip_code = $request['zipcode'];
			$address->status = 10;
			if($address->save())
			{
				$address_session = $request->session()->get('addressid');
	 
				$address_session["addressid"] = $address->id;
	
				$request->session()->put('addressid', $address_session);
	
				return 'true';
			}

		}

		public function starrating(Request $request)
		{
				$model = new \App\Star();
				$model->rest_id = $request['id'];
				$model->star_couont = $request['star'];
				$model->save();
		}

    public function paymentstatus($id)
    {
        if ($id) {

            $this->configPaytm();
            // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
            $ORDER_ID = $id;
    
            // Create an array having all required parameters for status query.
            $requestParamList = array("MID" => 'xDXBgS57377830380708' , "ORDERID" => $ORDER_ID);  
            
            $StatusCheckSum = $this->getChecksumFromArray($requestParamList,'c8BseEv%f!KLzQx7');
            
            $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
    
            // Call the PG's getTxnStatusNew() function for verifying the transaction status.
            $responseParamList = $this->getTxnStatusNew($requestParamList);

            $status = '';

            if($responseParamList['RESPCODE'] == '01')
            {
                $order = \App\Order::find($id);
                $order->transaction_id = $responseParamList['TXNID'];
                $order->is_paid = true;
                $order->save();

                return redirect('/member');
            }else{
                return 'Something went worng. Payment is not done successfully. Try Again. ';
            }
        }
    
    }

    public function configPaytm()
    {
        define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
        define('PAYTM_MERCHANT_KEY', 'c8BseEv%f!KLzQx7'); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', 'xDXBgS57377830380708'); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.

        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
        if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }

        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }

    
function encrypt_e($input, $ky) {
	$key   = html_entity_decode($ky);
	$iv = "@@@@&&&&####$$$$";
	$data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
	return $data;
}

function decrypt_e($crypt, $ky) {
	$key   = html_entity_decode($ky);
	$iv = "@@@@&&&&####$$$$";
	$data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
	return $data;
}

function generateSalt_e($length) {
	$random = "";
	srand((double) microtime() * 1000000);

	$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
	$data .= "0FGH45OP89";

	for ($i = 0; $i < $length; $i++) {
		$random .= substr($data, (rand() % (strlen($data))), 1);
	}

	return $random;
}

function checkString_e($value) {
	if ($value == 'null')
		$value = '';
	return $value;
}

function getChecksumFromArray($arrayList, $key, $sort=1) {
	if ($sort != 0) {
		ksort($arrayList);
	}
	$str = $this->getArray2Str($arrayList);
	$salt = $this->generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = $this->encrypt_e($hashString, $key);
	return $checksum;
}
function getChecksumFromString($str, $key) {
	
	$salt = generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = encrypt_e($hashString, $key);
	return $checksum;
}

function verifychecksum_e($arrayList, $key, $checksumvalue) {
	$arrayList = removeCheckSumParam($arrayList);
	ksort($arrayList);
	$str = getArray2StrForVerify($arrayList);
	$paytm_hash = decrypt_e($checksumvalue, $key);
	$salt = substr($paytm_hash, -4);

	$finalString = $str . "|" . $salt;

	$website_hash = hash("sha256", $finalString);
	$website_hash .= $salt;

	$validFlag = "FALSE";
	if ($website_hash == $paytm_hash) {
		$validFlag = "TRUE";
	} else {
		$validFlag = "FALSE";
	}
	return $validFlag;
}

function verifychecksum_eFromStr($str, $key, $checksumvalue) {
	$paytm_hash = decrypt_e($checksumvalue, $key);
	$salt = substr($paytm_hash, -4);

	$finalString = $str . "|" . $salt;

	$website_hash = hash("sha256", $finalString);
	$website_hash .= $salt;

	$validFlag = "FALSE";
	if ($website_hash == $paytm_hash) {
		$validFlag = "TRUE";
	} else {
		$validFlag = "FALSE";
	}
	return $validFlag;
}

function getArray2Str($arrayList) {
	$findme   = 'REFUND';
	$findmepipe = '|';
	$paramStr = "";
	$flag = 1;	
	foreach ($arrayList as $key => $value) {
		$pos = strpos($value, $findme);
		$pospipe = strpos($value, $findmepipe);
		if ($pos !== false || $pospipe !== false) 
		{
			continue;
		}
		
		if ($flag) {
			$paramStr .= $this->checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . $this->checkString_e($value);
		}
	}
	return $paramStr;
}

function getArray2StrForVerify($arrayList) {
	$paramStr = "";
	$flag = 1;
	foreach ($arrayList as $key => $value) {
		if ($flag) {
			$paramStr .= $this->checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . $this->checkString_e($value);
		}
	}
	return $paramStr;
}

function redirect2PG($paramList, $key) {
	$hashString = getchecksumFromArray($paramList);
	$checksum = encrypt_e($hashString, $key);
}

function removeCheckSumParam($arrayList) {
	if (isset($arrayList["CHECKSUMHASH"])) {
		unset($arrayList["CHECKSUMHASH"]);
	}
	return $arrayList;
}

function getTxnStatus($requestParamList) {
	return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}

function getTxnStatusNew($requestParamList) {
	return $this->callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}

function initiateTxnRefund($requestParamList) {
	$CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
	$requestParamList["CHECKSUM"] = $CHECKSUM;
	return callAPI(PAYTM_REFUND_URL, $requestParamList);
}

function callAPI($apiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($postData))                                                                       
	);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}

function callNewAPI($apiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($postData))                                                                       
	);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
	if ($sort != 0) {
		ksort($arrayList);
	}
	$str = getRefundArray2Str($arrayList);
	$salt = generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = encrypt_e($hashString, $key);
	return $checksum;
}
function getRefundArray2Str($arrayList) {	
	$findmepipe = '|';
	$paramStr = "";
	$flag = 1;	
	foreach ($arrayList as $key => $value) {		
		$pospipe = strpos($value, $findmepipe);
		if ($pospipe !== false) 
		{
			continue;
		}
		
		if ($flag) {
			$paramStr .= checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . checkString_e($value);
		}
	}
	return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);	
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_URL, $refundApiURL);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$headers = array();
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}

}
