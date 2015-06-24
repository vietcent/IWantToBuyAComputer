<!DOCTYPE HTML>

<?php
    // catching null values in the form

    if (condition) {
        # code...
    }
?>


<html>

<title>Registration</title>

<head>

</head>

<body>
    <main>
        <p>Create your account here!<br>If you already have an account with us</p>
    </main>
    <form action="welcome.php" method="post">
        First Name:
        <input type="text" name="fName"><br>
        Last Name:
        <input type="text" name="lName"><br>
        Email Address:
        <input type="text" name="email"><br>
        Gender:
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="NA">I'd rather not specify
        Comment on why are you using this website. This will help us improve it in the future. Thank you! (optional):
        <textarea name="comment" rows="5" cols="40"></textarea>



        <input type="submit">
    </form>

</body>

</html
