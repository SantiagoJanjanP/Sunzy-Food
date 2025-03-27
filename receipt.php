<?php
// Retrieve the order ID from the URL parameter
if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Display the receipt based on the order ID
    // Include the receipt template file

    // For example:
    include('receipt_template.php');
} else {
    // Handle case where order ID is not provided
    echo "Order ID not provided";
}
?>
