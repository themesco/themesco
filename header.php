<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package themesco
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'themesco' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php 
                        $themesco_logo = get_theme_mod('themesco_logo',get_stylesheet_directory_uri().'/img/logo.jpg');

                        if(!empty($themesco_logo)){
                            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand" title="'.get_bloginfo('title').'">';
                            echo '<img src="'.$themesco_logo.'" class="img-responsive" alt="">';
                            echo '</a>';
                        }
                    ?>
                </div>

                <!--======================Navbar=====================================-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php

                    $defaults = array(
                        'theme_location'  => 'primary',
                        'container'       => false,
                        'menu_class'      => 'nav navbar-nav navbar-right',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 1,
                    );

                    wp_nav_menu( $defaults );

                    ?>
                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
