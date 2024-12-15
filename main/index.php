
<?php
include('../config.php');
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
    include('../snow.php'); 
}
?>

<?php
require_once('wp-includes/component/header.php');
require_once('../config.php');

$sql = "SELECT * FROM restaurant_info LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

?>



<body class="home page-template page-template-page-no-footer page-template-page-no-footer-php page page-id-535 wp-custom-logo wp-embed-responsive elementor-default elementor-kit-6 elementor-page elementor-page-535" data-theme="dark" data-menu="sticky">
  <div id="loaded">
  </div>
  <div class="main-header js-main-header auto-hide-header ms-nb--transparent full-width" data-blur=on>
    <div class="main-header__layout">
      <div class="main-header__inner">
        <div class="main-header__logo">
          <div class="logo-dark">
            <a href="index.php">
              <img src="photos/logo.png" alt="" class="logooo" style="width: 140px;">
            </a>
          </div>
          <div class="logo-light">
            <a href="index.php">
              <img src="photos/logo.png" alt="" class="logooo">
            </a>
          </div>
        </div>
        <div class="ms-fs-wrapper">
          <div class="container-menu">
            <div class="action-menu">
              <div class="close-event">
              </div>
              <div class="open-event">
                <div class="text">
                  <span>Menu</span>
                  <span>Close</span>
                </div>
                <div class="burger">
                  <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-close" data-v-649bbaab="">
                    <line x1="13.788" y1="1.28816" x2="1.06011" y2="14.0161" stroke="currentColor" stroke-width="1.2">
                    </line>
                    <line x1="1.06049" y1="1.43963" x2="13.7884" y2="14.1675" stroke="currentColor" stroke-width="1.2">
                    </line>
                  </svg>
                  <svg viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-burger" data-v-649bbaab="">
                    <line x1="18" y1="0.6" y2="0.6" stroke="currentColor" stroke-width="1.2" data-v-649bbaab="">
                    </line>
                    <line x1="18" y1="5.7167" y2="5.7167" stroke="currentColor" stroke-width="1.2" data-v-649bbaab="">
                    </line>
                    <line x1="18" y1="10.8334" y2="10.8334" stroke="currentColor" stroke-width="1.2" data-v-649bbaab="">
                    </line>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="ms-fs-menu">
            <div class="ms-fs-container row">
              <div class="ms-fs--nav col-12 col-md-6">
                <ul id="primary-menu" class="navbar-nav-button">
                  <li id="menu-item-1903" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-535 current_page_item menu-item-1903">
                    <a href="index.php" aria-current="page">Home</a>
                  </li>
                  <li id="menu-item-1920" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1920">
                    <a href="about-me/">About me</a>
                  </li>
                  <li id="menu-item-1910" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1910">
                    <a href="contact/">Order</a>
                  </li>
                  <li id="menu-item-1921" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1921">
                    <a href="photos/menu.pdf">Menu</a>
                  </li>
                  <!-- <li id="menu-item-1972" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1972">
                    <a href="index.html">Nha Hang Am Thuc</a>
                    <ul class="sub-menu">
                      <li id="menu-item-1973" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1973">
                        <a href="">America</a>
                      </li>
                      <li id="menu-item-1981" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1981">
                        <a href="">Viet Nam</a>
                      </li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <div class="ms-fs--contacts col-12 col-md-6">
                <div data-elementor-type="page" data-elementor-id="1802" class="elementor elementor-1802" data-elementor-post-type="elementor_library">
                  <div class="elementor-element elementor-element-b966510 e-flex e-con-boxed e-con e-parent" data-id="b966510" data-element_type="container" data-core-v316-plus="true">
                    <div class="e-con-inner">
                      <div class="elementor-element elementor-element-98063aa elementor-widget elementor-widget-ms-button" data-id="98063aa" data-element_type="widget" data-widget_type="ms-button.default">
                        <div class="elementor-widget-container">
                          <a class="btn btn--sm btn--primary button" role="button" href="#">
                            <div class="ms-btn__text">
                              <span class="text--main">Call us</span>
                              <span class="text--ghost">Call us</span>
                            </div>
                            <span class="ms-btn--ripple">
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-23698ae elementor-section-full_width elementor-hidden-mobile elementor-section-height-default elementor-section-height-default" data-id="23698ae" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b9cd73" data-id="5b9cd73" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                          <div class="elementor-element elementor-element-0bb3493 elementor-widget elementor-widget-heading" data-id="0bb3493" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                              <style>
                                .elementor-heading-title {
                                  padding: 0;
                                  margin: 0;
                                  line-height: 1
                                }

                                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                  color: inherit;
                                  font-size: inherit;
                                  line-height: inherit
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                  font-size: 15px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                  font-size: 19px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                  font-size: 29px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                  font-size: 39px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                  font-size: 59px
                                }
                              </style>
                              <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo htmlspecialchars($row['restaurant_name']); ?>
                              </h2>
                            </div>
                          </div>
                          <div class="elementor-element elementor-element-0e12a8f elementor-widget elementor-widget-text-editor" data-id="0e12a8f" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                              <style>
                                .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                  background-color: #69727d;
                                  color: #fff
                                }

                                .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                  color: #69727d;
                                  border: 3px solid;
                                  background-color: transparent
                                }

                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                  margin-top: 8px
                                }

                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                  width: 1em;
                                  height: 1em
                                }

                                .elementor-widget-text-editor .elementor-drop-cap {
                                  float: left;
                                  text-align: center;
                                  line-height: 1;
                                  font-size: 50px
                                }

                                .elementor-widget-text-editor .elementor-drop-cap-letter {
                                  display: inline-block
                                }
                              </style>
                              <p>
                                <em>
                                  <?php echo htmlspecialchars($row['address']); ?>
                                </em>
                              </p>
                            </div>
                          </div>
                          <div class="elementor-element elementor-element-25aadbf elementor-widget elementor-widget-text-editor" data-id="25aadbf" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                              <p><?php echo htmlspecialchars($row['email']); ?></p>
                              <p><?php echo htmlspecialchars($row['phone']); ?></p>
                              <p>
                                <u>
                                  <b>Opening Hours</b>:
                                </u>
                              </p>
                              <p>Monday - Thursday:</p>
                              <p><?php echo htmlspecialchars($row['monday_thursday_hours']); ?></p>
                              <p>Friday - Saturday:</p>
                              <p><?php echo htmlspecialchars($row['friday_saturday_hours']); ?></p>
                              <p>Sunday &amp; Public Holidays:</p>
                              <p><?php echo htmlspecialchars($row['sunday_holiday_hours']); ?></p>
                              <p> </p>
                              <p> </p>
                              <p dir="ltr"> </p>
                            </div>
                          </div>
                          <div class="elementor-element elementor-element-d92dd0d elementor-widget elementor-widget-ms-social-icons" data-id="d92dd0d" data-element_type="widget" data-widget_type="ms-social-icons.default">
                            <div class="elementor-widget-container">
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
                                <div class="ms-s-w">
                                    <?php foreach($socialLinks as $social): ?>
                                        <a class="ms-s-i s-icon" href="<?= $social['link'] ?>" target="_blank">
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <main class="ms-main">
    <div class="ms-page-content">
      <section id="post-535" class="post-535 page type-page status-publish hentry">
        <div class="ms-custom-page">
          <div data-elementor-type="wp-page" data-elementor-id="535" class="elementor elementor-535" data-elementor-post-type="page">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-874b672 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="874b672" data-element_type="section">
              <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d082a6e" data-id="d082a6e" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-5d7028b elementor-widget elementor-widget-ms_slider_fs" data-id="5d7028b" data-element_type="widget" data-widget_type="ms_slider_fs.default">
                      <div class="elementor-widget-container">
                        <div class="ms-swiper-content">
                          <div class="ms-slider swiper-container" id="5d7028b" data-nav="" data-autoplay="" data-centered="off" data-mousewheel="on" data-simulatetouch="on" data-grabcursor="on" data-effect="slide" data-direction="vertical" data-loop="off" data-spv="1" data-spv-t="1" data-spv-m="1" data-space="0" data-space-t="0" data-space-m="0" data-speed="1000">
                            <div class="swiper-wrapper">
                              
                            <?php
                                require_once('../config.php');
                                $sql = "SELECT * FROM slider_images ORDER BY `order`";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $image_path = $row['image_path'];
                                        $title = $row['title'];
                                        $subtitle = $row['subtitle'];
                                        $link = $row['link'];
                                        echo '<div class="swiper-slide">
                                                <div class="slide-inner" data-swiper-parallax="49%">
                                                  <div class="ms-slider--img">
                                                    <img src="../main/photos/' . $image_path . '">
                                                  </div>
                                                  <div class="ms-slider--cont" data-swiper-parallax="-25%">
                                                    <div class="ms-cont__inner">
                                                      <h1 class="ms-sc--t">' . $title . '<br>' . $subtitle . '</h1>
                                                      <a class="ms-sc--l text" href="' . $link . '">Reserve now</a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>';
                                    }
                                } else {
                                    echo "Không có slide nào.";
                                }
                                $conn -> close();
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <div class="elementor-element elementor-element-bed22f6 e-flex e-con-boxed e-con e-parent" data-id="bed22f6" data-element_type="container" data-core-v316-plus="true">
              <div class="e-con-inner">
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // alert('hello duc coder'); 
    var swiper = new Swiper('.swiper-container', {
      direction: 'vertical',
      // loop: true, 
      speed: 1000,
      effect: 'slide',
      parallax: true,
      mousewheel: true,
      grabCursor: true,
      // Lặp lại
      // autoplay: {
      //   delay: 3000, 
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      // Nút điều hướng
      // navigation: {
      //   nextEl: '.swiper-button-next', // Nút next
      //   prevEl: '.swiper-button-prev', // Nút prev
      // }
    });
  });
</script>


<?php
require_once('wp-includes/component/footer.php');
?>
