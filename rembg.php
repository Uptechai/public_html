<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    require_once("./secret-keys/cerebrium_secret_keys.php");
    $url = "https://run.cerebrium.ai/v2/p-f0cdcd54/rembg/predict";
    $base64data = $_POST['base64data'];


    // Prepare the request data
    $data = array(
        'base64data' => "data:image/png;base64," . $base64data
    );

    // Set the headers
    $headers = array(
        'Authorization: ' . $cerebrium_access_token,
        'Content-Type: application/json'
    );

    $ch = curl_init($url);

    // Set the cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    // Decode the JSON string into a PHP object
    $responseObj = json_decode($response);

    // Access the 'result' property
    $response = $responseObj->result;
    curl_close($ch);

    header('Content-Type: application/json');
    echo json_encode(array("result" => $response));
} catch (Exception $e) {
    // Execute a specific task if an error occurs
    echo "An error occurred: " . $e->getMessage();
}




