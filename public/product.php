<?php

$file = fopen("products.csv", "r"); // your file
$header = fgetcsv($file, 1000, ";");

$sql = "INSERT INTO products 
(title, slug, summary, description, photo, stock, status, price, discount, is_featured, cat_id, created_at, updated_at) VALUES \n";

$rows = [];

while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {

    $title = addslashes(trim($data[2]));
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $photo = $data[1];
    $price = (float)$data[5];
    $stock = (int)$data[7];
    $status = ($data[8] == 1) ? 'active' : 'inactive';

    $rows[] = "('$title','$slug','$title','$title','$photo',$stock,'$status',$price,0,0,1,NOW(),NOW())";
}

$sql .= implode(",\n", $rows) . ";";

file_put_contents("products.sql", $sql);

echo "SQL file generated successfully!";