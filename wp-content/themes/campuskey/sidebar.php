<div id="sidebar">

  <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

    <?php dynamic_sidebar( 'sidebar1' ); ?>
    
    <div class="list-group list-group-collapse" id="accordion">
      <a href="#collapseOne" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Cras justo odio</a>
         <div id="collapseOne" class="collapse collapse-content-holder">
            <div class="collapse-content">Anim pariatur cliche reprehenderit</div>
        </div>
      <a href="#" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Dapibus ac facilisis in</a>
      <a href="#" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Morbi leo risus</a>
      <a href="#" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Porta ac consectetur ac</a>
      <a href="#" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Vestibulum at eros</a>
    </div>

    <div class="list-group list-group-static">
      <a href="#" class="list-group-item active">
        Cras justo odio
      </a>
      <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
      <a href="#" class="list-group-item">Morbi leo risus</a>
      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
      <a href="#" class="list-group-item">Vestibulum at eros</a>
    </div>

  <?php else : ?>

    <!-- This content shows up if there are no widgets defined in the backend. -->

    <div class="alert alert-danger">
      <p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
    </div>

  <?php endif; ?>

</div>