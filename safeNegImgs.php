<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$base64image = $_POST["image"];
$timestamp = $_POST["timestamp"];

// Set the path and filename for saving the image
$folder = 'negative-feedback/';
$filename = $folder . $timestamp . '.png';

// Decode the base64 data
$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64image));

// Save the image to the specified folder
file_put_contents($filename, $data);