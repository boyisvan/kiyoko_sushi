<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $query = "SELECT image FROM store_info WHERE id = 1";
    $result = $conn->query($query);
    $store_info = $result->fetch_assoc();
    $image = $store_info['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
    }
    $query = "UPDATE store_info SET title = ?, content = ?, image = ?, updated_at = CURRENT_TIMESTAMP WHERE id = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $title, $content, $image);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Store Info updated successfully.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Store Info.';
        $_SESSION['message_type'] = 'danger';
    }

    header('Location: store_info.php');
    exit;
}
?>
