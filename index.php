<?php
    
    
if (isset($_GET['code'])) { // Redirect w/ code
    $code = $_GET['code'];
}
else
{
    echo "Error"; exit;
}    

    
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://connect.stripe.com/oauth/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "client_secret=STRIPE_SECRET_KEY=".$code."&grant_type=authorization_code");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
header('location: http://LINK_TO_PAGE_OR_WEBSITE_YOU_SEND_USERS_TO_AFTER_AUTHENTICATION');
if (curl_errno($ch)) {
}
curl_close ($ch);
    
    
?>
