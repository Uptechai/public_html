<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_SESSION["usrId"];

use ImageKit\ImageKit;
require_once __DIR__ . '/vendor/autoload.php';

$imageId = $_POST["image"];
$maskId = $_POST["mask"];

echo $imageId;
echo "this was the imageid";

$imageName = trim($_POST["imageName"], "\"");

function getImageIdByName($imageName, $images) {
    foreach ($images as $image) {
        if ($image['name'] == $imageName) {
            return $image['id'];
        }
    }
    return null;
}
function removeImageFromArray($imageId, &$images) {
    foreach ($images as $key => $image) {
        if ($image['id'] == $imageId) {
            unset($images[$key]);
            return true;
        }
    }
    return false;
}

if (isset($imageName) && !empty($_POST["imageName"])) {
    
    echo "the imageName variable is set";

    require("db-connection/user.php");
    
    $stmt = $conn->prepare("SELECT * FROM user_general WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    $row = $stmt->fetch();
    $array = $row['images'];
    $images = json_decode($array, true);
    
    $imageId = getImageIdByName($imageName, $images);
    
    if (removeImageFromArray($imageId, $images)) {
        $updatedImagesJson = json_encode($images);
        $updateStmt = $conn->prepare("UPDATE user_general SET images = :images WHERE id = :id");
        $updateStmt->bindParam(":id", $id);
        $updateStmt->bindParam(":images", $updatedImagesJson);
        $updateStmt->execute();
    }
}


if (isset($_POST["mask"]) && isset($_POST["image"])) {
     echo "Image ID before deleteImage: " . $imageId . "\n";
    // $imageKit = new ImageKit(
    //     "public_KSBMZdOo9dZUG71jJdfYpHgW6Rc",
    //     "private_E06ZMJ/kf/icdet03Q/cg8gsADI=",
    //     "https://ik.imagekit.io/0zw3lz2yn/"
    // );
    
    // $imageKit->deleteFile($imageId);
    deleteImage($imageId);
    
    // $imageKit = new ImageKit(
    //     "public_KSBMZdOo9dZUG71jJdfYpHgW6Rc",
    //     "private_E06ZMJ/kf/icdet03Q/cg8gsADI=",
    //     "https://ik.imagekit.io/0zw3lz2yn/"
    // );
    
    // $imageKit->deleteFile($maskId);
    deleteMask($maskId);

} else {
    echo $imageId;
    
    $imageKit = new ImageKit(
        "public_KSBMZdOo9dZUG71jJdfYpHgW6Rc",
        "private_E06ZMJ/kf/icdet03Q/cg8gsADI=",
        "https://ik.imagekit.io/0zw3lz2yn/"
    );
    
    $deleteFile = $imageKit->deleteFile($imageId);
    
    echo("Delete file : " . json_encode($deleteFile));
}

function deleteImage($imageId) {
    $imageKit = new ImageKit(
        "public_KSBMZdOo9dZUG71jJdfYpHgW6Rc",
        "private_E06ZMJ/kf/icdet03Q/cg8gsADI=",
        "https://ik.imagekit.io/0zw3lz2yn/"
    );
    
    $result = $imageKit->deleteFile($imageId);
    echo "Delete image result: " . json_encode($result) . "\n";
}

function deleteMask($maskId) {
    $imageKit = new ImageKit(
        "public_KSBMZdOo9dZUG71jJdfYpHgW6Rc",
        "private_E06ZMJ/kf/icdet03Q/cg8gsADI=",
        "https://ik.imagekit.io/0zw3lz2yn/"
    );
    
    $imageKit->deleteFile($maskId);
}
?>