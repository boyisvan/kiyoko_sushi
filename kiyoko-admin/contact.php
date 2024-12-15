<?php 
require_once('header.php');
require_once('../config.php');

// Lấy thông tin nhà hàng từ cơ sở dữ liệu
$sql = "SELECT * FROM restaurant_info WHERE id = 1";
$result = $conn->query($sql);
$restaurant_info = $result->fetch_assoc();
?>

<!-- main  -->
<div class="p-3 flex min-h-screen flex-col">
    <div class="panel h-full w-full">
        <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Restaurant Contact Information</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="ltr:rounded-l-md rtl:rounded-r-md">Restaurant Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Monday - Thursday Hours</th>
                        <th>Friday - Saturday Hours</th>
                        <th>Sunday - Holiday Hours</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-black dark:text-white"><?php echo htmlspecialchars($restaurant_info['restaurant_name']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['address']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['email']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['phone']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['monday_thursday_hours']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['friday_saturday_hours']); ?></td>
                        <td><?php echo htmlspecialchars($restaurant_info['sunday_holiday_hours']); ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="document.getElementById('editForm').style.display='block';">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Contact Info Form -->
    <div id="editForm" class="hidden panel mt-4" style="width: 50%; min-width: 350px; margin: 20px auto;">
        <h4 class="text-xl font-semibold mb-4 mt-4">Edit Contact Information</h4>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="restaurant_name" class="block text-sm font-medium text-gray-700">Restaurant Name</label>
                <input type="text" name="restaurant_name" id="restaurant_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['restaurant_name']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['address']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['email']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['phone']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="monday_thursday_hours" class="block text-sm font-medium text-gray-700">Monday - Thursday Hours</label>
                <input type="text" name="monday_thursday_hours" id="monday_thursday_hours" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['monday_thursday_hours']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="friday_saturday_hours" class="block text-sm font-medium text-gray-700">Friday - Saturday Hours</label>
                <input type="text" name="friday_saturday_hours" id="friday_saturday_hours" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['friday_saturday_hours']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="sunday_holiday_hours" class="block text-sm font-medium text-gray-700">Sunday & Holiday Hours</label>
                <input type="text" name="sunday_holiday_hours" id="sunday_holiday_hours" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($restaurant_info['sunday_holiday_hours']); ?>" required>
            </div>

            <!-- Action buttons -->
            <div class="flex mt-4 gap-3">
                <button type="submit" name="update_info" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none" style="background-color: green;">
                    Submit
                </button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none" style="background-color: red;" onclick="document.getElementById('editForm').style.display='none';">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<?php 
require_once('footer.php');
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_info'])) {
    // Lấy dữ liệu từ form
    $restaurant_name = $_POST['restaurant_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $monday_thursday_hours = $_POST['monday_thursday_hours'];
    $friday_saturday_hours = $_POST['friday_saturday_hours'];
    $sunday_holiday_hours = $_POST['sunday_holiday_hours'];

    // Cập nhật thông tin vào cơ sở dữ liệu
    $sql = "UPDATE restaurant_info SET 
            restaurant_name = ?, 
            address = ?, 
            email = ?, 
            phone = ?, 
            monday_thursday_hours = ?, 
            friday_saturday_hours = ?, 
            sunday_holiday_hours = ? 
            WHERE id = 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $restaurant_name, $address, $email, $phone, $monday_thursday_hours, $friday_saturday_hours, $sunday_holiday_hours);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Information Updated!',
                    text: 'The restaurant contact information has been updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong while updating the information.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
}
?>