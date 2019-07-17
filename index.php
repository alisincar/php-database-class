<?php

use Database\Database;

include_once "Database.php";

$db = new Database();
$products = $db->orderBy()->join()->groupBy()->where("id = 2")->get("products");
echo "<pre>";
print_r($products);
