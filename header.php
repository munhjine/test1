<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$nav_menu_type = ( agensy_get_option( 'nav_menu_type' ) ) ? agensy_get_option( 'nav_menu_type' ) : 'horizontal';
$nav_menu_class = $nav_menu_type;
if ( $nav_menu_type == 'hamburger' ) {
  $nav_menu_class = 'hamburger-center';
}


$enable_social_icons = ( agensy_get_field( 'disable_social_icons' ) ) ? false : true;
$enable_social_icons = true;
$enable_side_contact = true;
$enable_side_contact = ( agensy_get_field( 'disable_side_contact' ) ) ? false : true;
$social_media = agensy_get_option( 'social_media' );
$side_contact = agensy_get_option( 'side_contact' );
$logo = ( agensy_get_option( 'logo' ) ) ? agensy_get_option( 'logo' ) : get_template_directory_uri() . '/images/logo@2x.png';
$retina_logo = ( agensy_get_option( 'retina_logo' ) ) ? agensy_get_option( 'retina_logo' ) : '';
$logo_symbol = ( agensy_get_option( 'logo_symbol' ) ) ? agensy_get_option( 'logo_symbol' ) : get_template_directory_uri() . '/images/logo-symbol.png';
$nav_menu_label = ( agensy_get_option( 'nav_menu_label' ) ) ? agensy_get_option( 'nav_menu_label' ) : esc_html__( 'Navigation', 'agensy' );
?>
<?php
if ( agensy_get_option( 'enable_preloader' ) ):
  $pre_loader_icon = ( agensy_get_option( 'pre_loader_icon' ) ) ? agensy_get_option( 'pre_loader_icon' ) : get_template_directory_uri() . '/images/preloader.png';


?>
<div class="preloader" id="preloader"> <span></span> <span></span> <span></span> <span></span>
  <div class="inner">
    <figure class="logo"><img src="<?php echo esc_url( $pre_loader_icon ); ?>" alt="<?php bloginfo( 'name' ); ?>"> </figure>
    <span class="percentage" id="percentage"></span> </div>
</div>
<!-- end preloader -->

<div class="transition-overlay"></div>
<!-- end transition-overlay -->
<?php endif; ?>
	
<?php if( is_active_sidebar( 'side-widget' ) ) : ?>
<div class="navigation-menu">
  <div class="inner">
    <div class="side-menu">
      <?php
      if ( has_nav_menu( 'header' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'header',
          'walker' => new WP_agensy_Navwalker(),
        ) );
      }
      ?>
    </div>
    <!-- end side-menu -->
    <?php dynamic_sidebar( 'side-widget' ); ?>
  </div>
  <!-- end inner --> 
</div>
<!-- end navigation-menu -->
<?php endif; ?>
	
	
<aside class="left-side">
  <div class="logo"> <img src="<?php echo esc_url( $logo_symbol ); ?>" alt="<?php bloginfo( 'name' ); ?>"> </div>
  <?php
  if ( $enable_social_icons ):
    $social_media = agensy_get_option( 'social_media' );
  if ( $social_media ):
    ?>
  <ul>
    <?php foreach ( $social_media as $social ) { ?>
    <li> <a
                                                    href="<?php echo esc_url( $social['url'] ); ?>"
                                                    title="<?php echo esc_attr( $social['title'] ); ?>"
                                                    target="_blank"
                                                    rel="noreferrer" data-text="<?php echo esc_html( $social['title'] ); ?>"><?php echo esc_html( $social['title'] ); ?></a> </li>
    <?php } ?>
  </ul>
  <?php endif; ?>
  <?php
  if ( agensy_get_option( 'enable_gotop' ) ):
    ?>
  <a href="#top" class="gotop"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-gotop.svg" alt="Image"></a>
  <?php
  endif;
  ?>
</aside>
<!-- end left-side -->
<?php endif; ?>
<nav class="navbar">
  <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>"
	<?php if( $retina_logo != '' ) : ?>
		srcset="<?php echo esc_url( $retina_logo ); ?>"
	<?php endif; ?>
		alt="<?php bloginfo( 'name' ); ?>"></a></div>
  <?php agensy_get_wpml_langs(); ?>
  <?php
  if ( $enable_side_contact ):
    $side_contact = agensy_get_option( 'side_contact' );
  if ( $side_contact ):
    ?>
  <div class="phone">
    <?php foreach ( $side_contact as $side_link ) { ?>
    <a
                                                    href="<?php echo esc_url( $side_link['url'] ); ?>"
                                                    title="<?php echo esc_attr( $side_link['title'] ); ?>"
                                                    data-text="<?php echo esc_html( $side_link['title'] ); ?>"><?php echo esc_html( $side_link['title'] ); ?></a>
    <?php } ?>
  </div>
  <!-- end phone -->
  
  <?php endif; ?>
  <?php endif; ?>
  <div class="main-menu">
    <?php
    if ( has_nav_menu( 'header' ) ) {
      wp_nav_menu( array(
        'theme_location' => 'header',
        'menu_class' => 'menu-horizontal',
        'walker' => new WP_agensy_Navwalker(),
      ) );
    }
    ?>
  </div>
  <!-- end main-menu -->
  
  <?php
  if ( has_nav_menu( 'header' ) ) {
    ?>
  <div class="hamburger-menu" id="hamburger-menu">
    <div class="burger">
      <svg id="burger-svg" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <title>Show / Hide Navigation</title>
        <rect class="burger-svg__base" width="50" height="50"/>
        <g class="burger-svg__bars">
          <rect class="burger-svg__bar burger-svg__bar-1" x="14" y="18" width="22" height="2"/>
          <rect class="burger-svg__bar burger-svg__bar-2" x="14" y="24" width="22" height="2"/>
          <rect class="burger-svg__bar burger-svg__bar-3" x="14" y="30" width="22" height="2"/>
        </g>
      </svg>
    </div>
    <!-- end burger --> 
  </div>
  <!-- end hamburger-menu -->
  <?php
  } else {

  }
  ?>
</nav>
