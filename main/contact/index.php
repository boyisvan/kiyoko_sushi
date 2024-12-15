<?php
require_once('../wp-includes/component/configweb.php');
?>
<?php
require_once('../wp-includes/component/configweb.php');
$sql = "SELECT snow_effect, store_status FROM settings WHERE id = 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $settings = $result->fetch_assoc();
    $snowEffect = $settings['snow_effect'];  
    $storeStatus = $settings['store_status'];  
} else {
    $snowEffect = 0;
    $storeStatus = 'open';
}
if ($storeStatus == 'coming_soon') {
    header("Location: /sushi_comming/");
    exit();
}

if ($snowEffect == 1) {
  include($_SERVER['DOCUMENT_ROOT'] . '/snow.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="../xmlrpc.php">
  <title><?php echo htmlspecialchars($row['title']) ?></title>
  <link rel="icon" type="image/png" href="data:image/png;base64,<?php echo base64_encode($favicon); ?>" />
  <link rel='dns-prefetch' href='http://www.fbgcdn.com/' />
  <link rel="alternate" type="application/rss+xml" title="Yoake Saarbrucken &raquo; Feed" href="../feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="Yoake Saarbrucken &raquo; Comments Feed" href="../comments/feed/index.html" />
  <link rel='stylesheet' id='contact-form-7-css' href='../wp-content/plugins/contact-form-7/includes/css/styles7404.css?ver=5.9.3' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-grid-css' href='../wp-content/themes/nicex/assets/css/vendor/bootstrap.min4b68.css?ver=1.0.4' type='text/css' media='all' />
  <link rel='stylesheet' id='swiper-css' href='../wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5' type='text/css' media='all' />
  <link rel='stylesheet' id='magnific-popup-css' href='../wp-content/themes/nicex/assets/css/vendor/magnific-popup4b68.css?ver=1.0.4' type='text/css' media='all' />
  <link rel='stylesheet' id='plyr-css' href='../wp-content/themes/nicex/assets/css/vendor/plyr4b68.css?ver=1.0.4' type='text/css' media='all' />
  <link rel='stylesheet' id='socicon-css' href='../wp-content/themes/nicex/assets/css/vendor/socicon4b68.css?ver=1.0.4' type='text/css' media='all' />
  <link rel='stylesheet' id='nicex-main-style-css' href='../wp-content/themes/nicex/assets/css/main4b68.css?ver=1.0.4' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-frontend-css' href='../wp-content/plugins/elementor/assets/css/frontend-lite.min021f.css?ver=3.20.4' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-6-css' href='../wp-content/uploads/elementor/css/post-607c6.css?ver=1712838776' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-pro-css' href='../wp-content/plugins/elementor-pro/assets/css/frontend-lite.min5829.css?ver=3.15.1' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-244-css' href='../wp-content/uploads/elementor/css/post-2449264.css?ver=1719998081' type='text/css' media='all' />
  <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.5.5' type='text/css' media='all' />
  <link rel='stylesheet' id='restaurant_system_public_style-css' href='../wp-content/plugins/menu-ordering-reservations/assets/css/public-stylea305.css?ver=2.4.2' type='text/css' media='all' />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <script type="text/javascript" src="../../www.fbgcdn.com/embedder/js/ewm2adc6.js?ver=6.5.5" id="jsforwp-blocks-frontend-js-js"></script>
  <script type="text/javascript" src="../wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
  <script type="text/javascript" src="../wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>
  <link rel="https://api.w.org/" href="../wp-json/index.html" />
  <link rel="alternate" type="application/json" href="../wp-json/wp/v2/pages/244.json" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
  <meta name="generator" content="WordPress 6.5.5" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='../index4978.html?p=244' />
  <link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embed98da.json?url=https%3A%2F%2Fyoake-sb.de%2Fcontact%2F" />
  <link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embed5d61?url=https%3A%2F%2Fyoake-sb.de%2Fcontact%2F&amp;format=xml" />
  <link rel="stylesheet" href="../css/aboutme.css">
</head>

<body class="page-template page-template-page-custom page-template-page-custom-php page page-id-244 wp-custom-logo wp-embed-responsive elementor-default elementor-kit-6 elementor-page elementor-page-244" data-theme="dark" data-menu="sticky">
  <div id="loaded"></div>
  <div class="main-header js-main-header auto-hide-header" data-blur=on>

    <?php
    require_once('../wp-includes/component/nav.php');
    ?>

  </div>
  <main class="ms-main">
    <div class="ms-page-content">

      <section id="post-244" class="post-244 page type-page status-publish hentry">
        <div class="ms-custom-page">
          <div data-elementor-type="wp-page" data-elementor-id="244" class="elementor elementor-244" data-elementor-post-type="page">
            <div class="elementor-element elementor-element-8c8efe2 e-flex e-con-boxed e-con e-parent" data-id="8c8efe2" data-element_type="container" data-core-v316-plus="true">
              <div class="e-con-inner">
                <div class="elementor-element elementor-element-c4799fe elementor-widget elementor-widget-heading" data-id="c4799fe" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">
                      <!-- nội dung -->
                    </h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-element elementor-element-76a11e3 e-flex e-con-boxed e-con e-parent" style="padding:0 5% ;">
              <div class="div" style="border-radius: 12px;overflow: hidden;box-shadow: rgba(145, 158, 171, 0.2) 0px 0px 2px 0px, rgba(145, 158, 171, 0.12) 0px 12px 24px -4px;">
                <iframe
                  src="https://app.resmio.com/kiyoko-restaurant/widget?backgroundColor=%23ffffff&borderRadius=10&color=%23555555&commentsDisabled=false&disableBranding=false&facebookLogin=true&fontSize=14px&height=460&id=kiyoko-restaurant&linkBackgroundColor=%2307a7c4&newsletterSignup=true&showLogo=false&style&width=330"
                  style="border:none; width: 100%; height: 600px;">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>


  <div class="back-to-top js-back-to-top" data-offset="350">
    <div class="ms-btt--inner">
      <span class="ms_tm--tooltip">Back To Top</span>
      <svg class="ms-btt-i" enable-background="new 0 0 96 96" height="96px" id="arrow_up" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path d="M52,84V21.656l21.457,21.456c1.561,1.562,4.095,1.562,5.656,0.001c1.562-1.562,1.562-4.096,0-5.658L50.829,9.172l0,0  c-0.186-0.186-0.391-0.352-0.609-0.498c-0.101-0.067-0.21-0.114-0.315-0.172c-0.124-0.066-0.242-0.142-0.373-0.195  c-0.135-0.057-0.275-0.089-0.415-0.129c-0.111-0.033-0.216-0.076-0.331-0.099C48.527,8.027,48.264,8,48.001,8l0,0  c-0.003,0-0.006,0.001-0.009,0.001c-0.259,0.001-0.519,0.027-0.774,0.078c-0.12,0.024-0.231,0.069-0.349,0.104  c-0.133,0.039-0.268,0.069-0.397,0.123c-0.139,0.058-0.265,0.136-0.396,0.208c-0.098,0.054-0.198,0.097-0.292,0.159  c-0.221,0.146-0.427,0.314-0.614,0.501L16.889,37.456c-1.562,1.562-1.562,4.095-0.001,5.657c1.562,1.562,4.094,1.562,5.658,0  L44,21.657V84c0,2.209,1.791,4,4,4S52,86.209,52,84z" />
      </svg>
    </div>
  </div>

  <footer class="ms-footer ms-footer--template">
    <div data-elementor-type="page" data-elementor-id="1754" class="elementor elementor-1754" data-elementor-post-type="elementor_library">
      <section class="elementor-section elementor-top-section elementor-element elementor-element-31953bb elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="31953bb" data-element_type="section">
        <div class="elementor-container elementor-column-gap-extended">
          <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-52abad6" data-id="52abad6" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
              <div class="elementor-element elementor-element-d999a4c elementor-widget elementor-widget-spacer" data-id="d999a4c" data-element_type="widget" data-widget_type="spacer.default">
                <div class="elementor-widget-container">
                  <div class="elementor-spacer">
                    <div class="elementor-spacer-inner"></div>
                  </div>
                </div>
              </div>
              <section class="elementor-section elementor-inner-section elementor-element elementor-element-9c1f864 elementor-section-full_width elementor-reverse-mobile elementor-section-height-default elementor-section-height-default" data-id="9c1f864" data-element_type="section">
                <div class="elementor-container elementor-column-gap-no">
                  <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-59265c5" data-id="59265c5" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                      <div class="elementor-element elementor-element-5fe6a53 elementor-widget elementor-widget-text-editor" data-id="5fe6a53" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                          <p>Copyright © 2024. Developed by <a href="http://www.facebook.com/gtrxn"><strong>GT</strong></a> Marketing Services.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-425b8d0" data-id="425b8d0" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                      <div class="elementor-element elementor-element-b2df8e8 elementor-hidden-mobile elementor-hidden-tablet elementor-widget elementor-widget-ms-social-icons" data-id="b2df8e8" data-element_type="widget" data-widget_type="ms-social-icons.default">
                      <?php
                          $sqllink = "SELECT platform, icon_class, link FROM social_links";
                          $resultlink = $conn->query($sqllink);

                          $socialLinks = [];
                          if ($resultlink->num_rows > 0) {
                              while($rowlink = $resultlink->fetch_assoc()) {
                                  $socialLinks[] = $rowlink; 
                              }
                          }
                          ?>
                          <div class="elementor-widget-container">
                              <div class="ms-s-w">
                                  <?php foreach($socialLinks as $social): ?>
                                      <a class="ms-s-i mono s-icon" href="<?= $social['link'] ?>" target="_blank">
                                          <i class="<?= $social['icon_class'] ?>"></i>
                                      </a>
                                  <?php endforeach; ?>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
    </div>
  </footer>

  <div class="ms_theme_mode">
    <div class="ms_tm--inner">
      <span class="ms_tm--tooltip">Theme Mode</span>
      <div class="theme-toggle" id="theme-toggle">
        <input type="checkbox" id="switcher" class="check">
        <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
          <mask class="moon" id="moon-mask">
            <rect x="0" y="0" width="100%" height="100%" fill="white"></rect>
            <circle cx="24" cy="10" r="6" fill="black"></circle>
          </mask>
          <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor"></circle>
          <g class="sun-beams" stroke="currentColor">
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </g>
        </svg>
      </div>
    </div>
  </div>

  <link rel='stylesheet' id='flatpickr-css' href='../wp-content/plugins/elementor/assets/lib/flatpickr/flatpickr.mineda1.css?ver=4.1.4' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-1754-css' href='../wp-content/uploads/elementor/css/post-1754824d.css?ver=1712838874' type='text/css' media='all' />
  <script type="text/javascript" src="../wp-content/plugins/contact-form-7/includes/swv/js/index7404.js?ver=5.9.3" id="swv-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/contact-form-7/includes/js/index7404.js?ver=5.9.3" id="contact-form-7-js"></script>
  <script type="text/javascript" src="../wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0" id="imagesloaded-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/modernizr4b68.js?ver=1.0.4" id="modernizr-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/isotope.pkgd.min4b68.js?ver=1.0.4" id="isotope-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/swiper-bundle.min4b68.js?ver=1.0.4" id="swiper-bundle-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/jarallax.min4b68.js?ver=1.0.4" id="jarallax-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/jarallax-video.min4b68.js?ver=1.0.4" id="jarallax-video-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/video-background4b68.js?ver=1.0.4" id="slider-video-background-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/plyr4b68.js?ver=1.0.4" id="plyr-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/jquery.justifiedGallery.min4b68.js?ver=1.0.4" id="justified-gallery-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/fslightbox4b68.js?ver=1.0.4" id="fslightbox-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/vendor/gsap.min4b68.js?ver=1.0.4" id="gsap-js"></script>
  <script type="text/javascript" src="../wp-content/themes/nicex/assets/js/app.min4b68.js?ver=1.0.4" id="nicex-main-script-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/menu-ordering-reservations/assets/js/public-scriptsa305.js?ver=2.4.2" id="restaurant_system_public_scripts_js-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor/assets/lib/flatpickr/flatpickr.mineda1.js?ver=4.1.4" id="flatpickr-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min5829.js?ver=3.15.1" id="elementor-pro-webpack-runtime-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor/assets/js/webpack.runtime.min021f.js?ver=3.20.4" id="elementor-webpack-runtime-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor/assets/js/frontend-modules.min021f.js?ver=3.20.4" id="elementor-frontend-modules-js"></script>
  <script type="text/javascript" src="../wp-includes/js/dist/vendor/wp-polyfill-inert.min0226.js?ver=3.1.2" id="wp-polyfill-inert-js"></script>
  <script type="text/javascript" src="../wp-includes/js/dist/vendor/regenerator-runtime.min6c85.js?ver=0.14.0" id="regenerator-runtime-js"></script>
  <script type="text/javascript" src="../wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0" id="wp-polyfill-js"></script>
  <script type="text/javascript" src="../wp-includes/js/dist/hooks.min2757.js?ver=2810c76e705dd1a53b18" id="wp-hooks-js"></script>
  <script type="text/javascript" src="../wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor-pro/assets/js/frontend.min5829.js?ver=3.15.1" id="elementor-pro-frontend-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2" id="elementor-waypoints-js"></script>
  <script type="text/javascript" src="../wp-includes/js/jquery/ui/core.min3f14.js?ver=1.13.2" id="jquery-ui-core-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor/assets/js/frontend.min021f.js?ver=3.20.4" id="elementor-frontend-js"></script>
  <script type="text/javascript" src="../wp-content/plugins/elementor-pro/assets/js/elements-handlers.min5829.js?ver=3.15.1" id="pro-elements-handlers-js"></script>

</body>

</html>