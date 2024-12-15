<?php
require_once('header.php');
require_once('../config.php');

// Kiểm tra xem có ID được truyền vào không
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['message'] = 'Invalid Social Link ID.';
    $_SESSION['message_type'] = 'danger';
    header('Location: social_link.php');
    exit;
}

$id = intval($_GET['id']);

// Lấy thông tin social link theo ID
$query = "SELECT * FROM social_links WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['message'] = 'Social Link not found.';
    $_SESSION['message_type'] = 'danger';
    header('Location: social_link.php');
    exit;
}

$social_link = $result->fetch_assoc();
?>

<div class="p-3 flex min-h-screen flex-col">
    <h2 class="text-2xl font-semibold text-center mb-6">Edit Social Link</h2>

    <!-- Hiển thị thông báo -->
    <?php 
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type'];
        echo "<div class='alert alert-$message_type'>$message</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <!-- Form chỉnh sửa social link -->
    <form action="process_edit_social_link.php" method="POST" class="w-full max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-4">
            <label for="platform" class="block text-sm font-semibold">Platform</label>
            <input type="text" id="platform" name="platform" value="<?php echo htmlspecialchars($social_link['platform']); ?>" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="link" class="block text-sm font-semibold">Link</label>
            <input type="url" id="link" name="link" value="<?php echo htmlspecialchars($social_link['link']); ?>" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="icon_class" class="block text-sm font-semibold">Select Social Media</label>
            <select id="icon_class" name="icon_class" class="form-control w-full px-4 py-2 border rounded-lg" required>
                <option value="fa-brands fa-facebook" <?php echo ($social_link['icon_class'] === 'fa-brands fa-facebook') ? 'selected' : ''; ?>>Facebook</option>
                <option value="fa-brands fa-instagram" <?php echo ($social_link['icon_class'] === 'fa-brands fa-instagram') ? 'selected' : ''; ?>>Instagram</option>
                <option value="fa-brands fa-google" <?php echo ($social_link['icon_class'] === 'fa-brands fa-google') ? 'selected' : ''; ?>>Google</option>
                <option value="fa-brands fa-twitter" <?php echo ($social_link['icon_class'] === 'fa-brands fa-twitter') ? 'selected' : ''; ?>>Twitter</option>
                <option value="fa-brands fa-youtube" <?php echo ($social_link['icon_class'] === 'fa-brands fa-youtube') ? 'selected' : ''; ?>>YouTube</option>
                <option value="fa-brands fa-linkedin" <?php echo ($social_link['icon_class'] === 'fa-brands fa-linkedin') ? 'selected' : ''; ?>>LinkedIn</option>
            </select>
        </div>

        <div class="flex justify-between">
            <button type="submit" name="update_social_link" class="btn btn-primary">Update Social Link</button>
            <a href="social_link.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>
