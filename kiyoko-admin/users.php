<?php 
require_once('header.php');
require_once('../config.php'); // Kết nối với cơ sở dữ liệu

// Lấy thông tin tài khoản admin từ cơ sở dữ liệu (giả sử admin có id = 1)
$sql = "SELECT * FROM users WHERE id = 1"; // Giả sử admin có id = 1
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>

<div class="p-3 flex min-h-screen flex-col">
    <div class="panel h-full w-full">
        <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Admin Account Information</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="ltr:rounded-l-md rtl:rounded-r-md">Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-black dark:text-white"><?php echo $user['username']; ?></td>
                        <td>
                            <div class="input-group">
                            <input type="password" id="passwordField" class="form-control" value="<?php echo htmlspecialchars($user['password']); ?>" disabled />
                                <button type="button" id="showPasswordBtn" class="">
                                    <i id="eyeIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning" onclick="document.getElementById('changePasswordForm').style.display='block';">Change Password</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Change Password Form -->
    <div id="changePasswordForm" class="hidden panel mt-4 " style="width: 50%;min-width: 350px;">
        <h4 class="text-xl font-semibold mb-4 mt-4">Change Password</h4>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="text" name="new_password" id="new_password" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input type="text" name="confirm_password" id="confirm_password" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

           <!-- Action buttons -->
        <div class="flex mt-4 gap-3">
            <button type="submit" name="change_password" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none" style="background-color: green;">
                Submit
            </button>
            <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none" style="background-color: red;" onclick="document.getElementById('changePasswordForm').style.display='none';">
                Cancel
            </button>
        </div>

        </form>
    </div>

</div>

<?php 
// Xử lý thay đổi mật khẩu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password == $confirm_password) {
        // Cập nhật mật khẩu mới vào cơ sở dữ liệu mà không mã hóa
        $sql = "UPDATE users SET password = ?, updated_at = NOW() WHERE id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $new_password);

        if ($stmt->execute()) {
            echo "<script>
                    Swal.fire({
                        title: 'Password Updated!',
                        text: 'Your password has been updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong while updating your password.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Password Mismatch!',
                    text: 'The new password and confirm password do not match.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
}
?>
<?php 
require_once('footer.php');
?>

<script>
    // Hiển thị / ẩn mật khẩu
    document.getElementById('showPasswordBtn').onclick = function() {
        var passwordField = document.getElementById('passwordField');
        var eyeIcon = document.getElementById('eyeIcon');
        var type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        if (eyeIcon.classList.contains('fa-eye')) {
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
