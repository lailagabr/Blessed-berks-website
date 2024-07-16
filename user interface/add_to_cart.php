<?php
session_start();
Include("connection.php");

if (isset($_GET['add'])) {
    $product_id = intval($_GET['add']); 
    $stmt = $connect->prepare("SELECT * FROM `product` WHERE `product_id` = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        if (isset($_SESSION['cart'])) {
            $product_found = false;

            foreach ($_SESSION['cart'] as &$cart_item) {
                if ($cart_item['id'] == $product_id) {
                    $cart_item['quantity'] += 1;
                    $product_found = true;
                    break;
                }
            }

            if (!$product_found) {
                $_SESSION['cart'][] = [
                    'id' => $product['product_id'], // Corrected key
                    'product_name' => $product['product_name'], // Corrected key
                    'product_price' => $product['product_price'], // Corrected key
                    'quantity' => 1,
                ];
            }
        } else {
            $_SESSION['cart'][] = [
                'id' => $product['product_id'], // Corrected key
                'product_name' => $product['product_name'], // Corrected key
                'product_price' => $product['product_price'], // Corrected key
                'quantity' => 1,
            ];
        }
    }

    $stmt->close();
}
if (isset($_GET['remove'])) {
    $product_id = intval($_GET['remove']); 

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}


header('Location: newcart.php');
?>
