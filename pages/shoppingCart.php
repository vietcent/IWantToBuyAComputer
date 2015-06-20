<!-- Project
shoppingCart.php
Summer 2015
Vincent Nguyen -->

<!-- PHP Login Information -->
<?php
$host = 'localhost';
$user = 'vqnguye1';
$password = 'cis425';
$database = 'IW2BACdb';
?>

<?php

if($_REQUEST['command'] == 'add' && $_REQUEST['idProduct'] > 0)
{
    $product_id = $_REQUEST['idProduct'];
    add_to_cart($product_id, 1);
    header('Location:shoppingCart.php');
    exit();
}
?>

<table id="product_table">
    <?php
    // Import necessary globals and functions
    include("include/IW2BACdb.php");
    include("include/IW2BACproductfunctions.php");

    $query = "SELECT * FROM IW2BAC_products";
    $result = mysqli_query($dbc, $query) or die("Error querying database");
    while ($row = mysqli_fetch_array($result)) {
        # code...

        echo '<tr>
        <td><img id="shopping_img" src="' . $row['image'] . '" /></td>
        <td><p><strong>' . $row['name'] . '</strong></p>
        <p>' . $row['description'] . '</p>
        <p>Price:<strong>&#36;' . $row['price'] . '</strong></p>
        </td>
        <td><input type="button" value="Add to Cart" onclick="addtocart(' . $row['id'] . ')" />
        </td>
        </tr>';
    }
    ?>
</table>

<form name "cartform" method="post" action="">
    <input type="hidden" name="idProduct" />
    <input type="hidden" name="command" />
    <span id="cont_shop">
        <input type="button" value="Continue Shopping" onclick="window.location.href='HW8.php'" />
    </span>
    <div id="formerror">
        <?php
            echo $message
            ?>
        </div>

<table id='cart_table'>
	<?php
		if(count($_SESSION['cart']))
		{
			echo '<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Amount</th>
			<th>Options</th>
			</tr>';

			$max = count($_SESSION['cart']);
			for($i = 0; $i < $max; $i++)
			{
				$product_id = $_SESSION['cart'][$i]['idProduct'];
				$quantity = $_SESSION['cart'][$i]['quantity'];
				$productName = get_product_name($dbc,$product_id);
				$product_price = get_price($dbc,$product_id);

				if($quantity == 0)
				{
					continue;
				}

				echo '<tr>
				<td>' . $product_name . '</td>
				<td>&#36; ' . $product_price . '</td>
				<td><input type="text" name="product' . $product_id . '" value="' . $quantity . '" maxlength ="4" size="2" /></td>
				<td>&#36; ' . $product_price*$quantity . '</td>
				<td><a href="javascript:delete(' . $product_id . ')">Remove Item</a></td>
				</td>';
			}

			echo '<tr>
			<td colspan="2"><strong>Order Total: &#36;' . get_order_total($dbc) . '</strong></td>
			<td></td>
			<td colspan="3" id="cart_buttons">
            <input type="submit" value="Clear Cart" onclick="clearCart()">
            <input type="submit" value="Update Cart" onclick="updateCart()">
            <input type="submit" value="Complete Order" onclick ="completeOrder()">
            </td>
            </tr>';
		}
        else
        {
            echo '<tr><td>There are no items in your shopping cart.</td></tr>';
        }
		?>
	</table>
	</form>
