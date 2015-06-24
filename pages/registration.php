<!DOCTYPE HTML>

<!--
Final Project
registration.php
Summer 2015
Vincent Nguyen -->

<?php
    // catching null values in the form

    if (condition) {
        # code...
    }
?>


    <html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />

        <!-- CSS Tag -->
        <link type="text/css" rel="stylesheet" href="../stylesheets/mainstyle.css" />

        <!-- JavaScript Tag -->


        <title>Registration</title>

    </head>

    <body>
        <main>
            <h1>Create your account here!
                <br>If you already have an account with us</h1>
        </main>

        <form action="welcome.php" method="post">
            First Name:
            <input type="text" name="fName" autofocus required autocomplete pattern="[a-zA-Z-' ]{4,30}">

            <br> Last Name:
            <input type="text" name="lName" required autocomplete pattern="[a-zA-Z-' ]{4,30}">
            <br>
            Email Address:
            <input type="text" name="email" required autocomplete>
            <br>
            Gender:
            <input type="radio" name="gender" value="Female">Female
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="NA">I'd rather not specify>
            <br>
            Comment on why are you using this website. This will help us improve it in the future. Thank you! (optional):
            <textarea name="comment" rows="5" cols="40" max="200" required></textarea>

            <p class="submit">
                <input type="submit" value="Sign Up" />
                <span class="reset">
                    <input type="reset" value="Clear Form" onclick="history.go(0)" />
        </form>

        <footer>
            <p>
                <small>&copy; Vincent Nguyen 2015</small>
            </p>
            <p>Vincent Nguyen is a unemployed 2015 alumni from the W.P Carey School of Business and needs work so he can leave his parent's house.
            </p>
            <address>
                You may reach him at <a href="mailto:vqnguyen16@gmail.com">vqnguyen16@gmail.com</a>
            </address>
        </footer>

    </body>

    </html
