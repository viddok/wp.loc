<div class="card my-4">
    <h5 class="card-header">
        <?php _e( 'Search', 'translate') ?>
    </h5>
    <div class="card-body">
        <div class="input-group">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
                <input type="text" name="s" id="s" class="form-control" placeholder=" <?php _e( 'Search for ...', 'translate') ?>">
                <span class="input-group-btn">
                    <input type="submit" id="searchsubmit" class="btn btn-secondary" value="<?php _e( 'Go!', 'translate') ?>" />
                </span>
            </form>
        </div>
    </div>
</div>