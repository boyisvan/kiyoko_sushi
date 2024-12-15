<?php
require_once('../wp-includes/component/configweb.php');
?>
<div class="main-header__layout">
    <div class="main-header__inner">
        <div class="main-header__logo">
            <div class="logo-dark">
                <a href="../index.php">
                    <img src="data:image/png;base64,<?php echo base64_encode($row['logo_dark']); ?>" alt="Logo Light">
                </a>
            </div>
            <div class="logo-light">
                <a href="../index.php">
                    <img src="data:image/png;base64,<?php echo base64_encode($row['logo_light']); ?>" alt="Logo Light">
                </a>
            </div>
        </div>
        <button class="main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu" aria-expanded="false" aria-controls="main-header-nav">
            <i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
            <span>Menu</span>
        </button>
        <nav class="main-header__nav js-main-header__nav main-header__default" id="main-header-nav" aria-labelledby="primary-menu">
            <ul id="primary-menu" class="navbar-nav">
                <li id="menu-item-1903" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1903"><a href="../index.php">Home</a></li>
                <li id="menu-item-1920" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1920"><a href="../about-me/index.php">Über Uns</a></li>
                <li id="menu-item-1910" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-244 current_page_item menu-item-1910"><a href="../contact/index.php" aria-current="page">Reservierung</a></li>
                <li id="menu-item-1921" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1921">
                    <a href="/main/photos/menu.pdf">
                        Speisekarte
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>