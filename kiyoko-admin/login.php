
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiyoko admin login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96" style="animation: xuathien 1s ease-in forwards;">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login to Admin Panel</h2>
        
        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" name="username" id="username" required class="w-full p-3 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" id="password" required class="w-full p-3 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">Login</button>
        </form>
    </div>
</body>
</html>


<style>
    @keyframes xuathien {
        from{
            opacity: 0;
            transform:translateY(-20px);
        }
        to{
            opacity: 1;
            transform:translateY(0);
        }
    }
</style>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: kiyoko-admin/index.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../config.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "<script>
                    Swal.fire({
                        title: 'Login successful!',
                        text: 'Redirecting to the admin page...',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                </script>";
            exit();
        } else {
            // If password is incorrect
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Incorrect password!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                </script>";
        }
    } else {
        // If username does not exist
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Username does not exist!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
    }
}
?>