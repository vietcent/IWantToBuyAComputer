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


  ?>
  <!-- End of PHP Session -->

<html lang="en">

<body>

  <head>
    <!-- Meta tag -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <!-- Link tag for CSS -->
    <link type="text/css" rel="stylesheet" href="stylesheets/mainstyle.css" />

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
              <form method="post" action="showform.php">
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

                          <div id="forgotPassword"
                          a href="forgotPassword.php">Forgot Password?</a>

                          <div id="createAccount"
                          a href="registration.php">Create an Account</a>
                      </ul>

                  </fieldset>

              </form>

          </div>

  </header>
  <main>
  </main>

  <div id="announcements">
      <table>
      <colgroup id="productsAndServices">
          <col span="2">
      </colgroup>
  </table>

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
