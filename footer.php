<?php
$footer_cta_button_label = agensy_get_option( 'footer_cta_button_label' ) ? agensy_get_option( 'footer_cta_button_label' ) : 'APPLY NOW';


$copyright = agensy_get_option( 'footer_copyright_text' );

if ( !$copyright ) {
  $copyright = esc_html__( '&copy; 2021 Agensy - All rights Reserved', 'agensy' );
}

?>
<footer class="footer">
  <div class="container">
    <div class="row">
      <?php if( agensy_get_option( 'footer_show_call_to_action' ) ) { ?>
      <div class="col-12">
        <div class="career wow fadeInUp"> <?php echo wp_kses_post( agensy_get_option( 'footer_cta_content' ) ); ?>
          <?php if( agensy_get_option( 'footer_cta_button_label' ) ) { ?>
          <div class="custom-link wow fadeInUp"> <a href="<?php echo esc_attr( agensy_get_option( 'footer_cta_button_link' ) ); ?>" class="custom-btn" title="<?php echo esc_attr( agensy_get_option( 'footer_cta_button_label' ) ); ?>"> <?php echo esc_html( agensy_get_option( 'footer_cta_button_label' ) ); ?> </a> <span></span> <i></i> </div>
          <!-- end custom-link --> 
          
        </div>
        <!-- end career --> 
      </div>
      <!-- end col-12 -->
      <?php } ?>
      <?php } ?>
      <?php if( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) { ?>
      <?php if( is_active_sidebar( 'footer-widget-1' ) ) : ?>
      <div class="col-lg-5 wow fadeInUp">
        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-2' ) ) : ?>
      <div class="col-lg-4 col-md-6 wow fadeInUp">
        <?php dynamic_sidebar( 'footer-widget-2' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-3' ) ) : ?>
      <div class="col-lg-3 col-md-6 wow fadeInUp">
        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-4' ) ) : ?>
      <div class="col-12 wow fadeInUp">
        <?php dynamic_sidebar( 'footer-widget-4' ); ?>
      </div>
      <?php endif; ?>
      <?php } ?>
      <div class="col-12 wow fadeInUp">
        <div class="sub-footer">
          <?php
          if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'footer',
              'menu_class' => 'footer-menu',
              'walker' => new sandwich_Menu_Walker(),
              'container' => ''
            ) );
          }
          ?>
          <?php if( $copyright ) { ?>
          <span><?php echo wp_kses_post( $copyright ); ?></span>
          <?php } ?>
        </div>
        <!-- end sub-footer --> 
      </div>
      <!-- end col-12 --> 
      
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</footer>
<audio id="hamburger-hover" src="<?php echo get_template_directory_uri(); ?>/audio/link.mp3" preload="auto"></audio>
<?php wp_footer(); ?>
</body></html>