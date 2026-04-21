<?php

$file = fopen("brands.csv", "r"); // your CSV file
$header = fgetcsv($file, 1000, ";");

$sql = "INSERT INTO brands 
(title, slug, status, created_at, updated_at) VALUES \n";

$rows = [];

while (($data = fgetcsv($file, 10000, ";")) !== FALSE) {

    // 🧹 CLEAN NAME
    $title = trim($data[2] ?? '');

    // skip empty / junk
    if (empty($title) || is_numeric($title)) continue;

    // fix encoding junk
    $title = preg_replace('/[^\x20-\x7E]/', '', $title);

    // escape
    $title = addslashes($title);

    // 🔗 SLUG GENERATE
    $slug = strtolower(preg_replace('/[^A-Za-z0-9]+/', '-', $title));
    $slug = trim($slug, '-');

    // ✅ STATUS
    $status = (isset($data[5]) && $data[5] == 1) ? 'active' : 'inactive';

    $rows[] = "('$title','$slug','$status',NOW(),NOW())";
}

$sql .= implode(",\n", $rows) . ";";

file_put_contents("brands.sql", $sql);

echo "Brands SQL generated successfully!";