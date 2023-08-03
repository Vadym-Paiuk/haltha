<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="logo header__logo">
                <a href="/">
                    <svg width="144" height="34" viewBox="0 0 144 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 11.4999C6.29974 11.4999 11.4067 6.393 11.4067 0.0932617H22.4067C22.4067 12.4681 12.3749 22.4999 0 22.4999V11.4999Z" fill="#A68FF1"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M33.8135 22.5001C27.5137 22.5001 22.4068 27.607 22.4068 33.9067L11.4068 33.9067C11.4068 21.5319 21.4386 11.5001 33.8135 11.5001L33.8135 22.5001Z" fill="#B8E1EE"/>
                        <path d="M65.4982 5.49707H69.2956V28.1865H65.4982V18.2342H54.5174V28.1865H50.72V5.49707H54.5174V14.6108H65.4982V5.49707Z" fill="currentColor"/>
                        <path d="M84.6478 12.3482H88.2554V28.1865H84.6478V26.0505C84.2259 26.7678 83.5403 27.3585 82.5909 27.8226C81.6521 28.2762 80.6553 28.503 79.6005 28.503C77.4697 28.503 75.6659 27.7066 74.1892 26.1138C72.7229 24.521 71.9898 22.5643 71.9898 20.2436C71.9898 17.9441 72.7229 15.9979 74.1892 14.4051C75.6659 12.8123 77.4697 12.0159 79.6005 12.0159C80.6447 12.0159 81.6416 12.248 82.5909 12.7121C83.5403 13.1763 84.2259 13.767 84.6478 14.4842V12.3482ZM80.3441 25.0695C81.2302 25.0695 82.0688 24.848 82.8599 24.405C83.6616 23.9619 84.2575 23.3976 84.6478 22.7119V17.8544C84.2575 17.1477 83.6668 16.5728 82.8757 16.1298C82.0846 15.6762 81.2407 15.4494 80.3441 15.4494C78.9834 15.4494 77.8442 15.9083 76.9265 16.826C76.0088 17.7331 75.5499 18.8724 75.5499 20.2436C75.5499 21.6149 76.0088 22.7647 76.9265 23.6929C77.8442 24.6106 78.9834 25.0695 80.3441 25.0695Z" fill="currentColor"/>
                        <path d="M95.1742 5.49707V28.1865H91.5825V5.49707H95.1742Z" fill="currentColor"/>
                        <path d="M107.694 24.848L107.9 28.0283C107.383 28.2815 106.734 28.408 105.954 28.408C104.171 28.408 102.731 27.8648 101.634 26.7783C100.537 25.6813 99.9887 24.1729 99.9887 22.2531V15.7817H96.9508V12.3482H99.9887V8.09196H103.58V12.3482H107.742V15.7817H103.58V22.0949C103.58 22.9915 103.855 23.7088 104.403 24.2467C104.962 24.7741 105.653 25.0379 106.476 25.0379C106.866 25.0379 107.272 24.9746 107.694 24.848Z" fill="currentColor"/>
                        <path d="M118.711 12.0159C120.705 12.0159 122.282 12.6594 123.442 13.9463C124.613 15.2332 125.198 16.9684 125.198 19.1519V28.1865H121.575V19.7215C121.575 18.4451 121.237 17.4431 120.562 16.7152C119.887 15.9768 118.98 15.6076 117.841 15.6076C117.039 15.6076 116.274 15.8081 115.547 16.2089C114.819 16.6097 114.265 17.1477 113.885 17.8228V28.1865H110.294V5.49707H113.885V14.4842C114.349 13.7248 115.014 13.1235 115.879 12.6805C116.754 12.2375 117.699 12.0159 118.711 12.0159Z" fill="currentColor"/>
                        <path d="M140.392 12.3482H144V28.1865H140.392V26.0505C139.97 26.7678 139.285 27.3585 138.335 27.8226C137.397 28.2762 136.4 28.503 135.345 28.503C133.214 28.503 131.41 27.7066 129.934 26.1138C128.468 24.521 127.734 22.5643 127.734 20.2436C127.734 17.9441 128.468 15.9979 129.934 14.4051C131.41 12.8123 133.214 12.0159 135.345 12.0159C136.389 12.0159 137.386 12.248 138.335 12.7121C139.285 13.1763 139.97 13.767 140.392 14.4842V12.3482ZM136.089 25.0695C136.975 25.0695 137.813 24.848 138.604 24.405C139.406 23.9619 140.002 23.3976 140.392 22.7119V17.8544C140.002 17.1477 139.411 16.5728 138.62 16.1298C137.829 15.6762 136.985 15.4494 136.089 15.4494C134.728 15.4494 133.589 15.9083 132.671 16.826C131.753 17.7331 131.294 18.8724 131.294 20.2436C131.294 21.6149 131.753 22.7647 132.671 23.6929C133.589 24.6106 134.728 25.0695 136.089 25.0695Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
            <div class="header__navigation">
                <nav class="header__navigation-main">
                    <!-- wp_nav_menu() - primary-menu -->
                    <div class="menu-primary-menu-container">
                        <ul class="menu primary-menu" id="primary-menu">
                            <!-- <li class="menu-item menu-item-has-children current-menu-ancestor">
                                <a href="./how.html">About</a>
                                <ul class="sub-menu">
                                    <li class="menu-item current-menu-item">
                                        <a href="./individuals.html">Individuals</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="./advisors.html">Advisors</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="menu-item">
                                <a href="./about.html">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="./studies.html">Studies</a>
                            </li>
                            <li class="menu-item">
                                <a href="./news.html">News</a>
                            </li>
                            <li class="menu-item">
                                <a href="./faqs.html">FAQ</a>
                            </li>
                        </ul>
                    </div>

                </nav>
                <nav class="header__navigation-secondary">
                    <a href="./contact.html" class="btn btn-tertiary btn-light header__navigation-btn">Contact Us</a>
                    <a href="" class="btn btn-tertiary btn-primary header__navigation-btn">Get Started</a>
                </nav>
            </div>
            <button type="button" class="header__navigation-btn-menu btn-primary btn" data-toggle=".header__navigation">
                <span class="header__navigation-btn-menu--inner">
                    <span></span><span></span><span></span>
                </span>
            </button>



        </div>
    </div>
</header>