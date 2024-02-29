<?php
include 'accessToken.php';
include 'securitycridential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600999";
$phone = "254708374149";
$amountsend = '1';
//$SecurityCredential ='D4cg+haY3L0VQb7fsL6HIw02fHd+qtEHQq61pq8ytdU8gX5DpW34ahjYJuFRPgzPKm7EPnG440fzXs8/QiZro+iadunS3p7wDdN/IqPWVd7ErtnvfsBWURU/YCPgnNvyvMapdjkV2aYKpJcxgn6NtxIiSc5gbBY7qAqvMmRqr0TcNTKELMyEIqn/kmZUtm1TJVZQSYE4Gnq937srxtzNMUqafrxtOPqqU0vjGlTyFcEXMHuRbvgvHFOM3sVYl+k7ABbszNMkSixG4K6LmBedxI1Rz/7X8HrZPJawdJ0vJw3f1AbtiUGBl/A8uV33oKQsRC2j208tmz62ZptyI5z6MQ==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';
$QueueTimeOutURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/b2cCallbackurl.php';
$ResultURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/dataMaxcallbackurl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;