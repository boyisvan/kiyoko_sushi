<?php
require_once __DIR__ . '/../../../config.php';

$sql = "SELECT menu_pdf FROM website_config LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $menu_pdf = $row['menu_pdf'];
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="menu.pdf"');
    echo $menu_pdf;
    exit;
} else {
    echo "Không tìm thấy file menu PDF.";
}
