<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$entry_id = $_GET['entry_id']; // Get the entry ID from the URL

// Path to entries.csv
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/entries.csv';

// Load the CSV data into an array
$entries = [];
if (($file = fopen($file_path, 'r')) !== false) {
    while (($data = fgetcsv($file)) !== false) {
        $entries[] = $data;
    }
    fclose($file);
}

// Remove the selected entry
if (isset($entries[$entry_id])) {
    unset($entries[$entry_id]);
}

// Write the updated data back to the CSV
if (($file = fopen($file_path, 'w')) !== false) {
    foreach ($entries as $entry) {
        fputcsv($file, $entry);
    }
    fclose($file);
}

// Redirect back to the journal entries page
header("Location: index.php");
exit();
?>