<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function getInfo()
    {
    	$data = array(
		    "pick_province" => "Hà Nội",
		    "pick_district" => "Quận Hai Bà Trưng",
		    "province" => "Hà nội",
		    "district" => "Quận Cầu Giấy",
		    "address" => "P.503 tòa nhà Auu Việt, số 1 Lê Đức Thọ",
		    "weight" => 1000,
		    "value" => 3000000,
		    "transport" => "fly"
		);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://dev.ghtk.vn/services/shipment/fee?" . http_build_query($data),
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_HTTPHEADER => array(
		        "Token: A0D4C37e0c8b58A7F9Db3DE1E0A189d69fb8a010",
		    ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		dd($response);
		//echo 'Response: ' . $response;
    }
}
