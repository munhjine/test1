<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package agensy
 */
get_header();
?>
<?php
agensy_render_page_header( 'search' );

$header_bg_image = agensy_get_option( 'search_header_bg_image' ) ? agensy_get_option( 'search_header_bg_image' ) : '';

				$header_style = 'background: url(' . esc_url( $header_bg_image ) .') center ;' ;


$show_sidebar = ( agensy_get_option( 'archive_show_sidebar' ) ) ? agensy_get_option( 'archive_show_sidebar' ) : 'yes';
$wrapper_cols = '11';

if ( !is_active_sidebar( 'sidebar-1' ) ) {
  $show_sidebar = 'no';
}

if ( $show_sidebar == 'yes' ) {
  $wrapper_cols = '8';
}
?>
<div class="header-image"  <?php if ( $header_style !== '' ) { echo 'style="' . esc_attr( $header_style ) . '"'; } ?>></div> 
  <section class="content-section">
    <div class="container">
      <div class="row justify-content-center">
        <?php
        if ( have_posts() ):
          ?>
        <div class="col-md-<?php echo esc_attr( $wrapper_cols ); ?>">
          <?php
          while ( have_posts() ):
            the_post();

          get_template_part( 'template-parts/listing' );

          endwhile;
          // show pagination
          agensy_pagination();
          ?>
        </div>
        <!-- end col-8 -->
        <?php
        if ( $show_sidebar == 'yes' ) {
          ?>
        <div class="col-md-4 col-sm-12">
          <?php get_sidebar(); ?>
        </div>
        <!-- end col-4 -->
        <?php
        }
        ?>
        <?php
        else :
          get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
<!-- end blog -->
<?php
get_footer();
