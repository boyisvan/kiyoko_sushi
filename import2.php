<?php
include('config.php');

// Truy vấn để lấy dữ liệu mạng xã hội
$sql = "SELECT platform, icon_class, link FROM social_links";
$result = $conn->query($sql);

// Lưu dữ liệu vào mảng $socialLinks
$socialLinks = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $socialLinks[] = $row; // Lưu từng bản ghi vào mảng
    }
}

// Đóng kết nối
$conn->close();
?>

<div class="ms-s-w">
    <?php foreach($socialLinks as $social): ?>
        <a class="ms-s-i s-icon" href="<?= $social['link'] ?>" target="_blank">
            <i class="<?= $social['icon_class'] ?>"></i>
        </a>
    <?php endforeach; ?>
</div>
