<?php

namespace app\models;

use Yii;

class Send {

    public function sendMsg($arrMsgdetails) {
        $sender = "MSGIND";
        $mobile = $arrMsgdetails['mobile'];
        
        $authkey = "218510AvMjvxWfndvp5b12d5a4";
        $encrypt = 1;
//        $message = "Get spacious 3BHK apartment & experience high end living in Wakad by paying 5% now,no EMI till possession P52100000298 https://bit.ly/2PyLfqz Call:8275566989";
        $message = "Get%20spacious%203BHK%20apartment%20%26%20experience%20high%20end%20living%20in%20Wakad%20by%20paying%205%25%20now%2cno%20EMI%20till%20possession%20P52100000298%20https%3a%2f%2fbit.ly%2f2PyLfqz%20Call%3a8275566989";
        $flash = "";
        $unicode = 1;
        $schtime = strtotime(Date("Y-m-d H:i:s"));
        $afterminutes = "10";
        $response = "json";
        $campaign = "";


        $curl = curl_init();
//        $a ="http://api.msg91.com/api/sendhttp.php?country=91&sender=MSGIND&route=4&mobiles=&authkey=&encrypt=&message=Hello!%20This%20is%20a%20test%20message&flash=&unicode=&schtime=&afterminutes=&response=&campaign=";
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=" . $sender . "&route=1&mobiles=" . $mobile . "&authkey=" . $authkey . "&encrypt=" . $encrypt . "&message=" . $message . "&flash=" . $flash . "&unicode=" . $unicode . "&schtime=" . $schtime . "&afterminutes=" . $afterminutes . "&response=" . $response . "&campaign=" . $campaign . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}
