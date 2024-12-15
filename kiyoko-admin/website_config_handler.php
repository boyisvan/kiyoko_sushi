<?php
require_once('../config.php');

$title = $_POST['title'];
$iframe_link = $_POST['iframe_link'];

// Kiểm tra tệp được tải lên cho các trường favicon, logo, và menu_pdf
$favicon = null;
$logo_light = null;
$logo_dark = null;
$menu_pdf_path = null;

// Xử lý favicon
if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] == 0) {
    $favicon = file_get_contents($_FILES['favicon']['tmp_name']);
}

// Xử lý logo light
if (isset($_FILES['logo_light']) && $_FILES['logo_light']['error'] == 0) {
    $logo_light = file_get_contents($_FILES['logo_light']['tmp_name']);
}

// Xử lý logo dark
if (isset($_FILES['logo_dark']) && $_FILES['logo_dark']['error'] == 0) {
    $logo_dark = file_get_contents($_FILES['logo_dark']['tmp_name']);
}

// Xử lý menu PDF
if (isset($_FILES['menu_pdf']) && $_FILES['menu_pdf']['error'] == 0) {
    $menu_pdf_path = '../main/photos/' . $_FILES['menu_pdf']['name']; // Lưu tệp PDF vào thư mục uploads
    move_uploaded_file($_FILES['menu_pdf']['tmp_name'], $menu_pdf_path);
}

// Lấy thông tin cấu hình hiện tại từ cơ sở dữ liệu
$query = "SELECT * FROM website_config LIMIT 1";
$result = $conn->query($query);
$website_config = $result->fetch_assoc();

// Cập nhật dữ liệu trong cơ sở dữ liệu
$sql = "UPDATE website_config SET 
            title = ?, 
            iframe_link = ?, 
            favicon = COALESCE(?, favicon), 
            logo_light = COALESCE(?, logo_light), 
            logo_dark = COALESCE(?, logo_dark), 
            menu_pdf_path = COALESCE(?, menu_pdf_path),
            updated_at = NOW() 
        WHERE id = 0";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    'ssssss',
    $title,
    $iframe_link,
    $favicon,
    $logo_light,
    $logo_dark,
    $menu_pdf_path
);

if ($stmt->execute()) {
    $_SESSION['message'] = "Website configuration updated successfully.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "There was an error updating the configuration.";
    $_SESSION['message_type'] = "error";
}

header('Location: website_config.php');
$stmt->close();
exit();
?>
