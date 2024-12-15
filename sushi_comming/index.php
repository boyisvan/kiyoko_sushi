<?php
include('../config.php');
$sql = "SELECT store_status, snow_effect FROM settings LIMIT 1";
$result = $conn->query($sql);

$storeStatus = 'open'; 
$snowEffect = 0; 

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storeStatus = $row['store_status']; 
    $snowEffect = $row['snow_effect'];
}
if ($storeStatus == 'open') {
    header("Location: /main/index.php");
    exit();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiyoko Sushi</title>
</head>
<body>
    <div class="container">
        <div class="blur-background"></div>
        <div class="foreground-image">
            <img src="/sushi_comming/pc.jpg" alt="Foreground Image">
        </div>
    </div>
</body>
</html>
<?php if ($snowEffect == 1): ?>
        <div class="snow-effect">
            <?php include('../snow.php'); ?>
        </div>
    <?php endif; ?>

<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }
    .blur-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/sushi_comming/pc.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(10px);
        z-index: 0;
    }

    .foreground-image {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 80%;
        height: 95%;
        z-index: 1;
        transform: translate(-50%,-50%);
        border-radius: 10px;
        overflow: hidden;
    }

    .foreground-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: xuathien 1s ease-in forwards;
    }

    @media (max-width: 768px) {
        .blur-background {
            background-image: url('/sushi_comming/mobile.jpg');
        }
        .foreground-image{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
        }
        .foreground-image img {
            content: url('/sushi_comming/mobile.jpg');
            width: auto;
        }
    }
    @media (min-width: 768px ) and (max-width: 1400px) {
        .foreground-image{
            width: 100%;
            height: 96%;
            display: flex;
            justify-content: center;
        }
        .foreground-image img {
            content: url('/sushi_comming/mobile.jpg');
            width: auto;  
        }
    }
    @keyframes xuathien {
        from{
            opacity: 0;
            transform: translateY(-20px);
        }
        to{
            opacity: 1;
            transform: translateY(0); 
        }
    }
</style>
