<?php
require_once('../config.php');
session_start();

// Xử lý thêm mới
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_social_link'])) {
    $platform = $_POST['platform'];
    $link = $_POST['link'];
    $icon_class = $_POST['icon_class'];

    $query = "INSERT INTO social_links (platform, link, icon_class) VALUES ('$platform', '$link', '$icon_class')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Social link added successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error adding social link!';
        $_SESSION['message_type'] = 'error';
    }
    header('Location: social_link.php');
    exit();
}

// Xử lý sửa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_social_link'])) {
    $id = $_POST['id'];
    $platform = $_POST['platform'];
    $link = $_POST['link'];
    $icon_class = $_POST['icon_class'];

    $query = "UPDATE social_links SET platform = '$platform', link = '$link', icon_class = '$icon_class' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Social link updated successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating social link!';
        $_SESSION['message_type'] = 'error';
    }
    header('Location: social_link.php');
    exit();
}

// Xử lý xóa
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $query = "DELETE FROM social_links WHERE id = $delete_id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Social link deleted successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error deleting social link!';
        $_SESSION['message_type'] = 'error';
    }
    header('Location: social_link.php');
    exit();
}
?>
