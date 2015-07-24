  <?php global $tpb_options; ?> 
  <footer>
    <div id="footer-main">
      <div class="footer-left">
        <?php $footer_image = $tpb_options['footer_image']['url']; ?>
        <div class="home-bubble">
          <img class="img-responsive" src="<?php echo $footer_image;?>" alt="Your home away from home."/>
        </div>
        <h2><?php bloginfo( 'name' ); ?>.<span><?php bloginfo( 'description' ); ?></span></h2>
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
