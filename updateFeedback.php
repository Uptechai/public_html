<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("db-connection/feedback.php");

$feedbackValue = $_POST["feedbackValue"];

$stmt = $conn->prepare("SELECT * FROM feedback");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$negative = $row['negative'];
$positive = $row['positive'];


try {
    
    if ($feedbackValue == 0) {
        // postive feedback
        $sql = "UPDATE feedback SET positive = :newValue";
        $positive++;
        $newValue = $positive;
    } else {
        $sql = "UPDATE feedback SET negative = :newValue";
        $negative++;
        $newValue = $negative;
    }

    $stmt = $conn->prepare($sql);
    // Bind the parameter
    $stmt->bindParam(':newValue', $newValue);

    // Execute the statement
    $stmt->execute();

    echo "Record updated successfully";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
