<?php 
require_once('header.php');
require_once('../config.php');
?>

<div class="p-3 flex min-h-screen flex-col">
    <div class="container mx-auto mt-5 " >
        <h2 class="mb-6 text-2xl font-semibold text-center text-gray-800">Add New Image</h2>
        <form action="add_image.php" method="POST" enctype="multipart/form-data" class="w-full max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg" style="padding: 15px;border-radius: 10px;">
            <div class="mb-5">
                <label for="title" class="form-label block text-gray-700 text-sm font-semibold">Title</label>
                <input type="text" class="form-controls mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" name="title" id="title" placeholder="Enter image title" required>
            </div>
            <div class="mb-5">
                <label for="subtitle" class="form-label block text-gray-700 text-sm font-semibold">Subtitle</label>
                <input type="text" class="form-controls mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" name="subtitle" id="subtitle" placeholder="Enter image subtitle">
            </div>
            <div class="mb-5">
                <label for="image_path" class="form-label block text-gray-700 text-sm font-semibold">Image</label>
                <input type="file" class="form-controls mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" name="image_path" id="image_path" accept="image/*" required>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400" style="background-color: green;">
                    Add Image
                </button>
                <a href="index.php" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Quay lại
                </a>
            </div>

        </form>
    </div>
</div>


<?php 
require_once('footer.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];

    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] == 0) {
        $image_name = $_FILES['image_path']['name'];
        $image_tmp = $_FILES['image_path']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_new_name = uniqid() . '.' . $image_ext;

        $upload_dir = '../main/photos/';
        if (move_uploaded_file($image_tmp, $upload_dir . $image_new_name)) {
            $query = "INSERT INTO slider_images (image_path, title, subtitle) 
                      VALUES ('$image_new_name', '$title', '$subtitle')";
            if (mysqli_query($conn, $query)) {
                echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Image added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                        }).then(function() {
                            window.location.href = 'index.php'; 
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error adding image. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                      </script>";
            }
        }
    }
}
?>