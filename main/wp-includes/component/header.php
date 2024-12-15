<?php
require_once __DIR__ . '/../../../config.php';

$sql = "SELECT * FROM website_config LIMIT 1";
$result = $conn->query($sql);

$title = "Kiyoko";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $favicon = $row['favicon'];
}

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name='robots' content='max-image-preview:large' />
    <title><?php echo htmlspecialchars($row['title']); ?> </title>
    <link rel="icon" type="image/png" href="data:image/png;base64,<?php echo base64_encode($favicon); ?>" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="/main/js/script1.js"></script>
    <link rel='stylesheet' id='online-css-css' href='../assets/embedder/css/order-onlineadc6.css?ver=6.5.5' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css' href='wp-content/plugins/contact-form-7/includes/css/styles7404.css?ver=5.9.3' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-grid-css' href='wp-content/themes/nicex/assets/css/vendor/bootstrap.min4b68.css?ver=1.0.4' type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css' href='wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='wp-content/themes/nicex/assets/css/vendor/magnific-popup4b68.css?ver=1.0.4' type='text/css' media='all' />
    <link rel='stylesheet' id='plyr-css' href='wp-content/themes/nicex/assets/css/vendor/plyr4b68.css?ver=1.0.4' type='text/css' media='all' />
    <link rel='stylesheet' id='socicon-css' href='wp-content/themes/nicex/assets/css/vendor/socicon4b68.css?ver=1.0.4' type='text/css' media='all' />
    <link rel='stylesheet' id='nicex-main-style-css' href='wp-content/themes/nicex/assets/css/main4b68.css?ver=1.0.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='wp-content/plugins/elementor/assets/css/frontend-lite.min021f.css?ver=3.20.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-6-css' href='wp-content/uploads/elementor/css/post-607c6.css?ver=1712838776' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-pro-css' href='wp-content/plugins/elementor-pro/assets/css/frontend-lite.min5829.css?ver=3.15.1' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-535-css' href='wp-content/uploads/elementor/css/post-535d2c1.css?ver=1719732783' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CInter%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.5.5' type='text/css' media='all' />
    <link rel='stylesheet' id='restaurant_system_public_style-css' href='wp-content/plugins/menu-ordering-reservations/assets/css/public-stylea305.css?ver=2.4.2' type='text/css' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type="text/javascript" src="../assets/embedder/js/ewm2adc6.js?ver=6.5.5" id="jsforwp-blocks-frontend-js-js"></script>
    <script type="text/javascript" src="wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script type="text/javascript" src="wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <link rel="https://api.w.org/" href="wp-json/index.html" />
    <link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/535.json" />
    <link rel="stylesheet" href="/main/css/style0.css">
    <link rel="stylesheet" href="/main/css/style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" id='swiper-css' href="/main/css/style_swiper.css">
    <link rel="stylesheet" href="../css/aboutme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>