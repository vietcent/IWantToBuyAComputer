<!DOCTYPE html>


<!-- PHP Login Information -->
<?php
// class server info
// $host = 'localhost';
// $user = 'vqnguye1';
// $password = 'cis425';
// $database = 'IW2BACdb';

// local server info

$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'IW2BACdb';

//Set up MySQL connection

$dbc = mysqli_connect($host,$user,$password,$database)
    or die('Error connection to MySQL server');

    //Begin Session
    session_start();
    

?>

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


<!-- Start of PHP Session -->
<?php
include('include/IW2BACdb.php');
include('include/HW8productfunctions.php');

  /*This statement checks the onsubmit='' command passed fromt he js and processes the necessary command:
    - Clear cart
    - Update item quantity
  */

  if ($_REQUEST['command'] == 'delete' && $_REQUEST['idProduct'] > 0)
  {
      # code...

      remove_product($_REQUEST['idProduct']);
  }
  elseif ($_REQUEST['command'] == 'clear') {
      # code...
      unset($_SESSION['cart']);
  }
  elseif ($_REQUEST['command'] == 'update') {
      # code...
      $max = count($_SESSION['cart']);

      for ($i=0; $i < $max ; $i++)
      {
          # code...

          $product_id = $_SESSION['cart'] [$i] ['idProduct'];
          $quantity = intval($_REQUEST['product' .$product_id]);

          if ($quantity > 0 && $quantity <= 1000)
          {
              # code...

              $_SESSION['cart'] [$i] ['productQuantity'] = $quantity;
          }
          else
          {
              # code...

              $message = 'Some products were not updated! Item quantity must be between 1 and 1000';
          }
      }
  }
  elseif ($_REQUEST['command'] == 'complete')
  {
      # code...

      header('Location: shoppingthankyou.html');
  }
  ?>
  <!-- End of PHP Session -->

  </html>
