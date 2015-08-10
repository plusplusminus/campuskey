  <?php global $tpb_options; ?> 
  <footer>
    <div id="footer-main">
      <div class="footer-left">
        <?php $footer_image = $tpb_options['footer_image']['url']; ?>
        <?php $footer_logo = $tpb_options['footer_logo']['url']; ?>
        <div class="home-bubble">
          <img class="img-responsive" src="<?php echo $footer_image;?>" alt="Your home away from home."/>
        </div>
        <div class="footer-logo">
          <h2><img class="img-responsive" src="<?php echo $footer_logo;?>"/><span><?php bloginfo( 'description' ); ?></span></h2>
        </div>
      </div>
      <div class="footer-right">
        <div class="copyright-info">
          <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
        </div>
        <div class="footer-nav">
          <?php secondary_nav('footer-nav',''); ?>
        </div>
      </div>
    </div>
  </footer>
</div>
    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
  </body>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
