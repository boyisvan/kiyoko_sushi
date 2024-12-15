<?php
require_once('header.php');
require_once('../config.php');

$query = "SELECT * FROM website_config LIMIT 1";
$result = $conn->query($query);
$website_config = $result->fetch_assoc();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    unset($_SESSION['message']);  
    unset($_SESSION['message_type']);  
}


?>

<div class="p-3 flex min-h-screen flex-col">
    <h2 class="text-2xl font-semibold text-center mb-6">Website Configuration</h2>
    <form action="website_config_handler.php" method="POST" enctype="multipart/form-data" class="mx-auto bg-white p-6 rounded-lg shadow-lg" style="width: 80%;">
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold">Website Title</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($website_config['title']); ?>" class="form-control w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold">Current Favicon</label>
            <?php if ($website_config['favicon']) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($website_config['favicon']); ?>" alt="Current Favicon" class="w-20 h-20 mb-4" />
            <?php } else { ?>
                <p>No favicon uploaded.</p>
            <?php } ?>
        </div>
        <div class="mb-4">
            <label for="favicon" class="block text-sm font-semibold">Update Favicon</label>
            <input type="file" name="favicon" id="favicon" class="form-control w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold">Current Logo (Light)</label>
            <?php if ($website_config['logo_light']) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($website_config['logo_light']); ?>" alt="Current Logo Light" class="w-full h-48 object-cover mb-4" style="max-width: 300px;" />
            <?php } else { ?>
                <p>No logo light uploaded.</p>
            <?php } ?>
        </div>
        <div class="mb-4">
            <label for="logo_light" class="block text-sm font-semibold">Update Logo (Light)</label>
            <input type="file" name="logo_light" id="logo_light" class="form-control w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold">Current Logo (Dark)</label>
            <?php if ($website_config['logo_dark']) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($website_config['logo_dark']); ?>" alt="Current Logo Dark" class="w-full h-48 object-cover mb-4" style="max-width: 300px;" />
            <?php } else { ?>
                <p>No logo dark uploaded.</p>
            <?php } ?>
        </div>
        <div class="mb-4">
            <label for="logo_dark" class="block text-sm font-semibold">Update Logo (Dark)</label>
            <input type="file" name="logo_dark" id="logo_dark" class="form-control w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold">Current Menu PDF</label>
            <?php if ($website_config['menu_pdf_path']) { ?>
                <a href="../<?php echo htmlspecialchars($website_config['menu_pdf_path']); ?>" target="_blank">View Current Menu PDF</a>
            <?php } else { ?>
                <p>No Menu PDF uploaded.</p>
            <?php } ?>
        </div>
        <div class="mb-4">
            <label for="menu_pdf" class="block text-sm font-semibold">Upload New Menu PDF</label>
            <input type="file" name="menu_pdf" id="menu_pdf" class="form-control w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="iframe_link" class="block text-sm font-semibold">Iframe Link</label>
            <textarea id="iframe_link" name="iframe_link" class="form-control w-full px-4 py-2 border rounded-lg" rows="4" required><?php echo htmlspecialchars($website_config['iframe_link']); ?></textarea>
            <div class="mt-3">
            <label for="iframe_link" class="block text-sm font-semibold">See Iframe</label>
            <div class="iframe-container" style="position: relative; width: 100%; height: 500px;">
            <!-- Lớp phủ, chặn mọi thao tác ngoài iframe -->
            <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;z-index: 10;"></div>
            
                <!-- Iframe của bạn -->
                <iframe src="<?php echo strip_tags($website_config['iframe_link']); ?>" 
                        width="100%" 
                        height="100%" 
                        style="border: 2px solid #ddd; border-radius: 10px; position: relative; pointer-events: auto;">
                </iframe>
            </div>



            </div>
        </div>

        <div class="flex gap-5">
            <button type="submit" class="btn btn-primary btn-sm">Update Website Configuration</button>
            <!-- <a href="website_config.php" class="btn btn-secondary btn-sm">Cancel</a> -->
        </div>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#iframe_link'))
        .catch(error => {
            console.error(error);
        });

    <?php if (isset($message)) { ?>
        Swal.fire({
            icon: '<?php echo $message_type; ?>', 
            title: '<?php echo $message; ?>',
            showConfirmButton: true
        });
    <?php } ?>
</script>
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
