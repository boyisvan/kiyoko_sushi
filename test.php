<?php
require_once  'config.php';

// Truy vấn để lấy cả title và favicon
$sql = "SELECT title, favicon FROM website_config LIMIT 1";
$result = $conn->query($sql);

$title = "Kiyoko"; // Giá trị mặc định

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title']; // Gán giá trị title từ cơ sở dữ liệu
    $favicon = $row['favicon']; // Gán favicon từ cơ sở dữ liệu
} else {
    die("Không tìm thấy dữ liệu trong cơ sở dữ liệu.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="icon" type="image/png" href="data:image/png;base64,<?php echo base64_encode($favicon); ?>" />
</head>

<body>
    <h1>Welcome to Kiyoko Sushi!</h1>
</body>

</html>