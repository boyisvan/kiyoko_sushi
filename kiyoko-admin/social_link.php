<?php 
require_once('header.php');
require_once('../config.php');

// Lấy danh sách social links
$query = "SELECT * FROM social_links";
$result = mysqli_query($conn, $query);
?>

<div class="p-3 flex min-h-screen flex-col">
    <h2 class="text-2xl font-semibold text-center mb-6">Social Links Management</h2>

    <!-- Thông báo -->
    <?php 
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type']; // success, error
        echo "
        <script>
            Swal.fire({
                icon: '$message_type',
                title: '$message',
                timer: 2000,
                showConfirmButton: false
            });
        </script>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <!-- Form thêm mới social link -->
    <form action="social_link_handler.php" method="POST" class="w-full max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold mb-4">Add New Social Link</h3>
        <div class="mb-4">
            <label for="platform" class="block text-sm font-semibold">Platform</label>
            <input type="text" id="platform" name="platform" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="link" class="block text-sm font-semibold">Link</label>
            <input type="url" id="link" name="link" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="icon_class" class="block text-sm font-semibold">Select Social Media</label>
            <select id="icon_class" name="icon_class" class="form-control w-full px-4 py-2 border rounded-lg" required>
                <option value="">-- Select Platform --</option>
                <option value="fa-brands fa-facebook">Facebook</option>
                <option value="fa-brands fa-instagram">Instagram</option>
                <option value="fa-brands fa-google">Google</option>
                <option value="fa-brands fa-twitter">Twitter</option>
                <option value="fa-brands fa-youtube">YouTube</option>
                <option value="fa-brands fa-linkedin">LinkedIn</option>
            </select>
        </div>
        <button type="submit" name="add_social_link" class="btn btn-primary w-full">Add Social Link</button>
    </form>

    <!-- Hiển thị danh sách social link -->
    <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-lg">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Platform</th>
                    <th class="px-4 py-2 text-left">Link</th>
                    <th class="px-4 py-2 text-left">Icon</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="px-4 py-2"><?php echo $row['platform']; ?></td>
                    <td class="px-4 py-2"><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                    <td class="px-4 py-2"><i class="<?php echo htmlspecialchars($row['icon_class']); ?>"></i></td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="edit_social_link.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
require_once('footer.php');
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'social_link_handler.php?delete_id=' + id;
            }
        });
    }
</script>
