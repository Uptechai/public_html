<?php
// Turn error reporting on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SESSION["credits"] <= 0) {
    $allowedIP = '84.158.0.0'; // Replace with the IP address you want to allow

    if ($_SERVER['REMOTE_ADDR'] == $allowedIP) {
        // IP address is allowed
        // Add your code here
        $_SESSION["credits"] = 3;
    } else {
        $_SESSION["credits"] = 0;
        exit();
    }
} 
$_SESSION["credits"] = $_SESSION["credits"] - 1;   

// Beige
// White
// Light grey
// Light pink
// Light blue
// Pastel tone
// volumetric lighting

// specify default parameters
$a_prompt = "best quality, extremely detailed, ultra realistic";
$negative_prompt = "ugly, text, font, writing, logo, watermark, hands, fingers, cropped, worst quality, low quality, drawing, painting, dark, depressing, reflection, lid, soap dispenser, cap, attachments, edges, countertops, tabletop, rid, lines, unbalanced, noise, border, backlighting, rim lighting, dimly lit, brick walls, floor, wood";
$extension = "8k, lumen reflections, ultra realistic, studio quality, HDR, Studio Lighting, Product Photography, simplistic, unreal engine";
$prompt = "product photo of an item in a white, empty room, soft shadows, polar white, HDR, ultra realistic, studio lighting, product photography, 3d, depth of field, simplistic, unreal engine, colorgrading, volumetric, evenly spread light, low contrast, professional lighting, well-lit, diffuse light
";


$url = "https://run.cerebrium.ai/v2/p-f0cdcd54/controlnet-default/predict";



// Set the input JSON body for the ControlNet API
$input_json = json_encode([
    "prompt" => $prompt,
    "base64image" => str_replace("data:image/png;base64,", "", $_POST["base64data"]),
    "brightning_factor" => 1.1,
    "low_threshold" => 30,
    "high_threshold" => 10,
    "neg_prompt" => $negative_prompt,
    "scale" => 15,
]);


// Initialize the cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $input_json);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: ' . 'private-faca486270ef2ac7466b',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 120); // Set the timeout in seconds

// Execute the cURL request and get the response
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($http_code >= 200 && $http_code < 300) {
    // The API call succeeded, process the response
    $responseData = json_decode($response, true);
    $base64data = $responseData['result'];
    // echo $base64data;
    echo json_encode([
        "base64data" => $base64data,
        "credits" => $_SESSION["credits"]
    ]);
} else {
    echo "API call failed...";
}