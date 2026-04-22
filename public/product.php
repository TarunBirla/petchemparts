<?php

function extractPartNumber($text) {
    // Extract from brackets ()
    if (preg_match('/\((.*?)\)/', $text, $matches)) {
        return trim(end($matches)); // last bracket value
    }
    return null;
}

function extractModelNumber($text) {
    // Case 1: After comma
    if (strpos($text, ',') !== false) {
        $parts = explode(',', $text);
        return trim(end($parts));
    }

    // Case 2: Last word
    $words = explode(' ', trim($text));
    return trim(end($words));
}

$file = fopen("products.csv", "r");
$header = fgetcsv($file, 1000, ";");

$sql = "INSERT INTO products 
(title, slug, summary, description, photo, stock, status, price, discount, is_featured, cat_id, part_number, model_number, created_at, updated_at) VALUES \n";

$rows = [];

while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {

    $title = addslashes(trim($data[2]));
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $photo = $data[1];
    $price = (float)$data[5];
    $stock = (int)$data[7];
    $status = ($data[8] == 1) ? 'active' : 'inactive';

    // 🔥 Extract logic
    $part_number = extractPartNumber($title);
    $model_number = extractModelNumber($title);

    $part_number = $part_number ? "'".addslashes($part_number)."'" : "NULL";
    $model_number = $model_number ? "'".addslashes($model_number)."'" : "NULL";

    $rows[] = "('$title','$slug','$title','$title','$photo',$stock,'$status',$price,0,0,1,$part_number,$model_number,NOW(),NOW())";
}

$sql .= implode(",\n", $rows) . ";";

file_put_contents("productsnew.sql", $sql);

echo "✅ SQL file generated with part_number & model_number!";