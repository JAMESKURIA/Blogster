<?php
include "../assets/connection.php";


// Fetch all categories in the database
$query = "SELECT * FROM CATEGORIES";
$result = mysqli_query($db, $query);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
