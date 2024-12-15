<?php
require_once('../config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_social_link'])) {
    $id = intval($_POST['id']);
    $platform = $_POST['platform'];
    $link = $_POST['link'];
    $icon_class = $_POST['icon_class'];

    // Cập nhật thông tin social link
    $update_query = "UPDATE social_links SET platform = ?, link = ?, icon_class = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssi", $platform, $link, $icon_class, $id);

    if ($update_stmt->execute()) {
        $_SESSION['message'] = 'Social Link updated successfully.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Social Link.';
        $_SESSION['message_type'] = 'danger';
    }

    header('Location: social_link.php');
    exit;
} else {
    $_SESSION['message'] = 'Invalid request.';
    $_SESSION['message_type'] = 'danger';
    header('Location: social_link.php');
    exit;
}
