<?php

if (!isset($access_token)) {
    $access_token = null;
}

if (is_null($access_token)) {
    $sfdc_tokens_json = getAccessTokenFromSFDC();
    $sfdc_tokens = json_decode($sfdc_tokens_json, true);
    print_r($sfdc_tokens);
    
    echo "<br/>New line";
    
}

function getAccessTokenFromSFDC() {
    $sfdc_token_request_endpoint = "https://login.salesforce.com/services/oauth2/token";

    $data = array(
        'grant_type' => 'password',
        'client_id' => '3MVG9i1HRpGLXp.qkF8N41ZyYwD2K8qDZgKzti6Y3gqcghklQcwi0tFwAg33kx6rh1jIzIa8GfqzFyMqqv8L9',
        'client_secret' => '1957267389927066618',
        'username' => 'skoduru2708@gmail.com.lightning',
        'password' => 'Sairam@12aXxNAoWKGb87pBHbZdu0fuit'
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sfdc_token_request_endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    return $output;
}

?>