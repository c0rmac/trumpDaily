<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cormac
 * Date: 17/08/2017
 * Time: 22:04
 */


// Setup SQL configuration
$servername = "localhost";
$serverusername = "root";
$serverpassword = "";
$dbname = "cormacstest";

// Setup SQL connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
