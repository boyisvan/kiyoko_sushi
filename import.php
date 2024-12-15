<?php

include('config.php');

// Kiểm tra kết nối database
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối database thành công!<br>";
}

// Đọc file
$favicon = file_get_contents('main/photos/logo.png');
$logo_light = file_get_contents('main/photos/logo.png');
$logo_dark = file_get_contents('main/photos/logo.png');
$menu_pdf_path = 'main/photos/menu.pdf';

// Kiểm tra dữ liệu đọc được
echo "Title: Kiyoko - The Best Sushi<br>";
echo "Iframe Link: https://app.resmio.com/kiyoko-restaurant/widget<br>";
echo "Menu PDF Path: $menu_pdf_path<br>";
echo "Favicon size: " . strlen($favicon) . " bytes<br>";

// SQL chuẩn bị
$sql = "INSERT INTO website_config (title, favicon, logo_light, logo_dark, menu_pdf_path, iframe_link) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Chuẩn bị câu lệnh thất bại: " . $conn->error);
}

$title = "Kiyoko - The Best Sushi";
$iframe_link = "https://app.resmio.com/kiyoko-restaurant/widget?backgroundColor=%23ffffff&borderRadius=10&color=%23555555";

$stmt->bind_param('ssssss', $title, $favicon, $logo_light, $logo_dark, $menu_pdf_path, $iframe_link);

// Thực thi
if (!$stmt->execute()) {
    die("Thực thi câu lệnh thất bại: " . $stmt->error);
} else {
    echo "Thêm dữ liệu thành công!<br>";
}

$stmt->close();
$conn->close();
?>
