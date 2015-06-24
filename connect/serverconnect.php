<?php

// Final Project 
// serverconnect.php
// Summer2015
// Vincent Nguyen

    //Setup connection variables

    $host = 'localhost';
    $user = 'vqnguye1';
    $pw = 'cis425';
    $db = 'vqnguye1';

    // Connect to mySQL

    $dbc = mysqli_connect($host, $user, $pw, $db) or die('Connect error - SERVER');


?>
