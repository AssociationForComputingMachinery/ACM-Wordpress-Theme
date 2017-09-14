<!DOCTYPE html>
<html <?php language_attributes(); ?> class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js-priorityNav wf-robotocondensed-n7-active wf-robotocondensed-n4-active wf-robotocondensed-n3-active wf-robotocondensed-i3-active wf-robotocondensed-i4-active wf-robotocondensed-i7-active wf-roboto-n4-active wf-roboto-n5-active wf-active">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="shortcut icon" href="/favicon.ico?v=2">
    <meta class="foundation-data-attribute-namespace">
    <meta class="foundation-mq-xxlarge">
    <meta class="foundation-mq-xlarge-only">
    <meta class="foundation-mq-xlarge">
    <meta class="foundation-mq-large-only">
    <meta class="foundation-mq-large">
    <meta class="foundation-mq-medium-only">
    <meta class="foundation-mq-medium">
    <meta class="foundation-mq-small-only">
    <meta class="foundation-mq-small">
    <meta class="foundation-mq-topbar">
    <title>Association for Computing Machinery</title>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php wp_head(); ?>
  </head>

  <body class="posttype_<?php echo get_post_type(get_the_ID()); ?> <?php echo is_home()?'is_home':'not_home';?>">
    <div id="header" class="row">
      <nav class="top-bar eyebrow show-for-medium-up" data-topbar data-options="is_hover: false">
        <section class="top-bar-section">
          <div id="skiptocontent"><a href="#SkipTarget">skip to main content</a></div>
          <?php if ( has_nav_menu( 'topsmall' ) ) : ?>

            <?php
              wp_nav_menu( array(
                'theme_location' => 'topsmall',
                'menu_class'     => 'right',
                'depth'          => 1,
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
              ) );
            ?>

            <?php endif; ?>

        </section>
      </nav>
      <div class="clearfix utilities-area">
        <div class="logo-section">
          <div class="navbar-header show-for-large-up">
            <a class="navbar-brand" href="<?php echo get_home_url();?>">
              <img alt="ACM Logo" height="78" class="logo" title="Home" src="<?php echo get_theme_mod('logo_image'); ?>"/>
            </a>
          </div>
          <div class="navbar-header hide-for-large-up">
            <a href="<?php echo get_home_url();?>"> <img alt="ACM Logo" class="img-responsive hide-for-large-up"
              title="Home"
              src="http://www.acm.org/images/top-menu/acm_logo_mobile.svg">
            </a>
          </div>
        </div>
        <div id="acm-description" class="column large-5 show-for-large-up">
          <div>
            <?php echo get_bloginfo ( 'description' ); ?>
            <!-- We're an international society of educators, scientists, technologists and engineers dedicated to the advancement of computer science. We offer a world-class <a href="#">Digital Library</a>, <a href="#">publications</a>, <a href="#">conferences</a>,
            and more. -->
          </div>
        </div>
        <div id="ctas-and-search" class="column large-5 medium-6 no-pad-left ctas-and-search">
          <?php if ( has_nav_menu( 'secondary' ) ) : ?>

          <?php
            wp_nav_menu( array(
              'theme_location' => 'secondary',
              'menu_class'     => 'block-grid right',
              'depth'          => 1,
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span>',
            ) );
          ?>

          <?php endif; ?>

        </div>
      </div>
      <nav class="top-bar main-nav" data-topbar data-options="is_hover: false">
        <ul class="title-area">
          <li class="toggle-topbar menu-icon"><a
            href="/#"><span></span> </a></li>
          </ul>
          <section class="top-bar-section">
            <div class="mobile-links">
              <div class="btn-group">
                <?php //wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu', 'menu_id' => 'secondary-menu' ) ); ?>
              </div>
              <div class="mobile-search">
                <!-- <form class="acm-search-form" id="mobile_form_1" action="/search"
                  method="get">
                  <i class="fa fa-search left"></i>
                  <label class="" for="search_mobile_1">Search</label>
                  <input type="text" id="search_mobile_1" autocomplete="off" required="required" class="acm-searchbox-input" name="q"/>
                </form> -->
                <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                <div>
                <i class="fa fa-search left"></i>
                <input class="text" type="text" value=" " name="s" id="s" />
                <input type="submit" class="submit button" name="submit" value="<?php _e('Search');?>" />
                </div>
                </form>
              </div>
            </div>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
            <button class="nav__dropdown-toggle">MORE</button>
            <div class="more-list-box"></div>
              <!-- <ul>
              <li class="has-dropdown not-click"><a href="#">About ACM</a></li>
              <li class="has-dropdown not-click"><a href="#">Membership</a></li>
              <li class="has-dropdown not-click"><a href="#">Publications</a></li>
              <li class="has-dropdown not-click"><a href="#">Special Interest Groups</a></li>
              <li class="has-dropdown not-click"><a href="#">Conferences</a></li>
              <li class="has-dropdown not-click"><a href="#">Chapters</a></li>
              <li class="has-dropdown not-click"><a href="#">Awards</a></li>
              <li class="has-dropdown not-click"><a href="#">Education</a></li>
              <li class="has-dropdown not-click"><a href="#">Public Policy</a></li>
              <li class="has-dropdown not-click"><a href="#">Governance</a></li>
            </ul> -->
          </section>
        </nav>
      </div>
      <div id="main" >
