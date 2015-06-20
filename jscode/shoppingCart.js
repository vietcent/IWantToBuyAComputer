// Project
// shoppingCart.js
// Summer 2015
// Vincent Nguyen


function delete(idProduct)
{
    if (confirm('Are you sure you want to delete this item?'))
    {
        document.cartform.productid.value = productid;
        document.cartform.command.value = 'delete';
        document.cartform.submit();
    }
}

function clearCart()
{
    if (confirm('Are you sure you wish to empty your cart?'))
    {
        document.cartform.command.value = 'clear';
        document.cartform.submit();
    }
}

function updateCart() {
    document.cartform.command.value = 'update';
    document.cartform.submit();
}

function completeOrder() {
    document.cartform.command.value = 'complete';
    document.cartform.submit();
}

function addtocart(prod_id){
    // This js is necessary to determine which button on the form
    // the user clicked

    document.productform.idProduct.value = prod_id;
    document.productform.command.value = 'add';
    document.productform.submit();
}

function get_product_name($db, $product_id){
    $query = "SELECT name FROM IW2BAC_Product WHERE id=$product_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    return $row['name'];
}

function get_price($db, $product_id){
    $query = "SELECT price from IW2BAC_Product WHERE id = $product_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    return $row['price'];
}

function remove_product($product_id) {
    // body...
    $product_id = intval($product_id);
    $max = count($_SESSION['cart']);

    for ($i = 0; $i < $max; $i++) {

        if ($product_id == $_SESSION['cart'][$i]['productId']) {

            unset($_SESSION['cart'][$i]);
            break;

        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function get_order_total($db){

    $max = count($_SESSION['cart']);
    $sum = 0;

    for ($i = 0; $i < $max; $i++) {

        $product_id = $_SESSION['cart'][$i]['productId'];
        $quantity = $_SESSION['cart'][$i]['quantity'];
        $price = get_price($db, $product_id);
        $sum += $price * quantity;
    }
    return $sum;
}

function add_to_cart($product_id, $quantity) {
    // body...

    if ($product_id < 1 || $quantity < 1) {
        return;
    }

    if (is_array($_SESSION['cart'])) {
        $exists_results = product_exists($product_id);
        $exists = $exists_results[0];
        $position = $exists_results[1];

        if ($exists) {
            $new_quantity = intval($_SESSION['cart'][$position]['productQuantity']);
            $_SESSION['cart'][$max]['productQuantity'] = $new_quantity;
        }
        else {
            $max = count($_SESSION['cart']);
            $_SESSION['cart'][$max]['productId'] = $product_id;
            $_SESSION['cart'][$max]['productQuantity'] = $quantity;
        }
    }
    else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productId'] = $product_id;
		$_SESSION['cart'][1]['productQuantity'] = $quantity;
    }
}

function product_exists($product_id)
{
	$product_id = intval($product_id);
	$max = count($_SESSION['cart']);
	$flag = 0;
	
	for($i = 0; $i < $max; $i++)
	{
		if($product_id == $_SESSION['cart'][$i]['productId'])
		{
			$flag = 1;
			break;
		}
	}
	return array ($flag,$i);
}
