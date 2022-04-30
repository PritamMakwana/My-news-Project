<?php

$hostname = "http://localhost/mynews";

$conn = mysqli_connect("localhost","root","","news-site") or die("connection failed : " . mysqli_connect_error());

if ($conn) {
    echo "<script>console.log('Connected ok')</script>";
}
else
{
    echo "<script>console.log('Some Issue!')</script>";
}

?>