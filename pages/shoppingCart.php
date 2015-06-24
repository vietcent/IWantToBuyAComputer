<!DOCTYPE html>

<!--
Final Project
index.html
Course / SLN
Name
-->

<!-- Start of PHP Session -->
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

    // grabbing cookie
    $cookieName = "customer";
    $cookieExpire = time() + (86400*30);
    setcookie($cookieName,"",$cookieExpire,"/");

    session_start("customer");

    //import necessary globals and functions
    include("../include/IW2BACdb.php");
    include("../include/productfunctions.php");

    // This statement checks the onsubmit for the shopping cart

    if ($_REQUEST['command'] == 'delete' && $_REQUEST['productId'] > 0) {
        # code...
        removeProduct($_REQUEST['productId']);
    }
    elseif ($_REQUEST['command'] == 'clear') {
        # code...
        unset($_SESSION['cart']);
    }
    elseif ($_REQUEST['command'] == 'update') {
        # code...
        $max = count($_SESSION['cart']);

        for ($i=0; $i < $max ; $i++) {
            # code...
            $productId = $_SESSION['cart'][$i]['productId'];
            $quantity = intval($_REQUEST['product' . $productId]);

            if ($quantity > 0 && $quantity <= 1000) {
                # code...
                $_SESSION['cart'][$i]['quantity'] = $quantity;
            }
            else {
                # code...
                $message = 'Some products were not updated! Item quantity must be between 1 and 1000';
            }
        }
    }
    elseif ($_REQUEST['command'] == 'complete') {
        # code...
        header('Location:shoppingthankyou.html');
    }
  ?>
  <!-- End of PHP Session -->

<html lang="en">

<body>

  <head>
    <!-- Meta tag -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <!-- Link tag for CSS -->
    <link type="text/css" rel="stylesheet" href="../stylesheets/mainstyle.css" />
    <link type="text/css" rel="stylesheet" href="../stylesheets/shoppingCart.css" />

    <!-- Link tag for Javascript -->
    <script src ="code.jquery.com/jquery-latest.min.js"> </script>
    <script src="jscode/Unslider.js"> </script>
    <script type="text/javascript" src="jscode/shoppingCart.js"></script>



    <!-- Web Page Title -->
    <title>I Want To Build a Computer</title>

  </head>
  <header>

      <div id="websiteHead">
      <p class="subtitle">"A safe and easy place to choose your next computer!"</p>
  </div>

      <div id="navigation">
          <ul>
              <li>
                  <a href="index.htm">Home</a>
              </li>

              <li>
                  <a href="pages/productPage.htm">Products</a>
              </li>

              <li>
                  <a href="pages/servicePage.htm">Services</a>
              </li>

              <li>
                  <a href="pages/faq.html">About Us</a>
              </li>

              <li>
                  <a href="pages/contactUs.htm">Contact US</a>
              </li>
          </ul>
      </div>

          <div class="mini-login">
              <form method="post" action="process.php">
                  <fieldset>
                      <h3 class="loginHere">Login Here</h2>
                      <ul>
                          <li>
                              <label for="emailAddress">Account Email:</label>
                              <input type="email" id="email" name="email" class="login"
                              required
                              placeholder="Enter registered email address" />
                          </li>
                          <li>
                              <label for="password">Password:</label>
                              <input type="password" id="password" name="password" class="login"
                              required
                              placeholder="Enter password here" />
                          </li>

                          <input type="submit" class="loginButton" value="Log In" />

                          <div id="forgotPassword">
                          <a href="forgotPassword.php">Forgot Password?</a>
                      </div>


                          <div id="createAccount">
                          <a href="pages/registration.php">Create an Account</a>
                      </div>

                      </ul>

                  </fieldset>

              </form>

          </div>

  </header>
  <main>
      <form name="cartform" method="post" action="">
          <input type="hidden" name="productId" />
          <input type="hidden" name="command" />
          <span id="cont_shop">
              <input type="button" value="Continue Shopping" onclick="window.location.href='products.php'" />
          </span>
          <div id="formerror">
              <?php
              echo $message
              ?>
          </div>
          <table id="cart_table">
              <?php
              if (count($_SESSION['cart'])) {
                  # code...
                  echo '<tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Options</th>
                  </tr>';

                  $max = count($_SESSION['cart']);
                  for ($i=0; $i < $max; $i++)
                  {
                      # code...
                      $productId = $_SESSION['cart'][$i]['productId'];
                      $quantity = $_SESSION['cart'][$i]['productQuantity'];
                      $productName = getProductName($dbc,$productId);
                      $productPrice = getPrice($dbc, $productId);

                      if ($quantity == 0) {
                          # code...
                          continue;
                      }

                      echo '<tr>
                      <td>' . $productName . '</td>
                      <td>&#36; ' . $productPrice. '</td>
                      <td><input type="text" name="product' . $productId . '" value="' . $quantity . '" maxlength="4" size ="2" /></td>
                      <td>&#36; ' . $productPrice * $quantity . '</td>
                      <td><a href="javascript:del(' . $productId .')">Remove Item</a></td>
                      </tr>';
                  }

                  echo '<tr>
                  <td colspan="2"><strong>Order Total: &#36;' . getOrderTotal($dbc) . '</strong></td>
                  <td></td>
                  <td colspan="3" id="cart_buttons">
                  <input type="submit" value="Clear Cart" onclick="clearCart()">
                  <input type="submit" value="Update Cart" onclick="updateCart()">
                  <input type="submit" value="Complete Order" onclick="completeOrder()">
                  </td>
                  </tr>';
              }
              else {
                  # code...
                  echo "<tr><td>There are no items in your shopping cart. START SHOPPING!</td></tr>";
              }
              ?>
          </table>
      </form>

  </main>

  <div id="announcements">

  </div>


  <footer>

      <div id="socialLinks">
          <a href="https://www.linkedin.com/in/vqnguyen16" target="_blank">Linkedin</a>
          <a href="www.twitter.com" target="_blank">Twitter</a>
          <a href="https://github.com/vietcent" target="_blank">Vincent's Github Account</a>
      </div>

      <p><small>&copy; Vincent Nguyen 2015</small></p>
      <p>Vincent Nguyen is a unemployed 2015 alumni from the W.P Carey School of Business and needs work so he can leave his parent's house.
      </p>
          <address>
              You may reach him at <a href="mailto:vqnguyen16@gmail.com">vqnguyen16@gmail.com</a>
          </address>
  </footer>

  </body>

</html>
