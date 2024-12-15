<?php
require_once __DIR__ . '/../../../config.php';

$sql = "SELECT * FROM website_config LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $favicon = $row['favicon'];
}
