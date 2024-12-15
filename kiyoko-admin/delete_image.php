<?php 
require_once('../config.php');
session_start(); 

if (isset($_GET['id'])) {
    $image_id = $_GET['id'];
    $query = "SELECT * FROM slider_images WHERE id = $image_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $image = mysqli_fetch_assoc($result);
        if ($image) {
            $image_path = '../main/photos/' . $image['image_path'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $delete_query = "DELETE FROM slider_images WHERE id = $image_id";
            if (mysqli_query($conn, $delete_query)) {
                $_SESSION['message'] = 'Image deleted successfully!';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Error deleting image from the database.';
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'No image found with this ID.';
            $_SESSION['message_type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Error querying the database.';
        $_SESSION['message_type'] = 'error';
    }
    header('Location: index.php');
    exit();
}
?>
