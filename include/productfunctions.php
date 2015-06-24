<?php

// This function queries the database and returns the name of the productid the user selected to place in their shopping cart.
//
// Returns: String
// Arguments: $db
//             $product_id

function getProductName($db,$productId)
{
    $query = "SELECT name FROM IW2BAC_Product WHERE productId = $productId";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    return $row['productName'];
}

function getPrice($db,$productId)
{
    $query = "SELECT price FROM IW2BAC_Product WHERE productId = $productId";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    return $row['productPrice'];
}

function removeProduct($productId)
{
    $productId = intval($productId);
    $max = count($_SESSION['cart']);

    for($i=0; $i< $max;$i++) {
        # code...
        if ($productId == $_SESSION['cart'][$i]['productId']) {
            # code...
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function getOrderTotal($db)
{
    $max = count($_SESSION['cart']);
    $sum = 0;

    for ($i=0; $i < $max; $i++) {
        # code...
        $productId = $_SESSION['cart'][$i]['productId'];
        $quantity = $_SESSION['cart'][$i]['productQuantity'];
        $price = getPrice($db,$productId);
        $sum += $productPrice * $productQuantity;
    }
    return $sum;
}

function addToCart($productId, $productQuantity)
{
    if ($productId < 1 || $productQuantity < 1) {
        # code...
        return;
    }

    if (is_array($_SESSION['cart'])) {
        # code...
        $existsResults = productExists($productId);
        $exists = $existsResults[0];
        $position = $existsResults[1];

        if ($exists) {
            # code...
            $newQuantity = intval($_SESSION['cart'][$position]['productQuantity']);
            $newQuantity++;
            $_SESSION['cart'][$position]['productQuantity'] = $newQuantity;
        }
        else {
            # code...
            $max = count($_SESSION['cart']);
            $_SESSION['cart'][$max]['productId'] = $productId;
            $_SESSION['cart'][$max]['productQuantity'] = $quantity;
        }
    }
    else {
        # code...
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productId'] = $productId;
        $_SESSION['cart'][0]['productQuantity'] = $productQuantity;
    }
}

function productExists($productId)
{
    $productId = intval($productId);
    $max = count($_SESSION['cart']);
    $flag = 0;

    for ($i=0; $i < $max ; $i++) {
        # code...
        if ($productId == $_SESSION['cart'][$i]['productId']) {
            # code...
            $flag = 1;
            break;
        }
    }
    return array ($flag,$i);
}

?>
