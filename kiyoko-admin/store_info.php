<?php
require_once('header.php');
require_once('../config.php');

// Lấy thông tin "store_info" hiện tại
$query = "SELECT * FROM store_info LIMIT 1";
$result = $conn->query($query);
$store_info = $result->fetch_assoc();
?>

<div class="p-3 flex min-h-screen flex-col">
    <h2 class="text-2xl font-semibold text-center mb-6">About Me Information</h2>
    <?php 
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type'];
        echo "<div class='alert alert-$message_type'>$message</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <form action="store_info_handler.php" method="POST" enctype="multipart/form-data" class="mx-auto bg-white p-6 rounded-lg shadow-lg " style="width: 80%;" >
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold">Title about me</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($store_info['title']); ?>" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-semibold">Content about me</label>
            <textarea id="content" name="content" class="form-control w-full px-4 py-2 border rounded-lg" rows="10" style="height: 400px;"  required><?php echo htmlspecialchars($store_info['content']); ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold">Current Image</label>
            <?php if ($store_info['image']) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($store_info['image']); ?>" alt="Current Image" class="w-full h-48 object-cover mb-4" style="max-width: 300px;"/>
            <?php } else { ?>
                <p>No image uploaded.</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-semibold">Update New Image</label>
            <input type="file" name="image" id="image" class="form-control w-full px-4 py-2 border rounded-lg" >
        </div>
        <div class="flex gap-5">
            <button type="submit" class="btn btn-primary btn-sm">Update Store Info</button>
            <!-- <a href="store_info.php" class="btn btn-secondary btn-sm">Cancel</a> -->
        </div>
    </form>
</div>

<!-- Thêm CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php
// Kiểm tra nếu có thông báo thành công hoặc lỗi từ PHP
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];

    // Hiển thị SweetAlert2 thông báo sau khi cập nhật
    echo "<script>
        Swal.fire({
            icon: '$message_type',
            title: '$message',
            showConfirmButton: true
        });
    </script>";

    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

<?php
require_once('footer.php');
?>

<style>
    @media (max-width: 600px) {
    form {
        width: 350px; 
    }
}
</style>
