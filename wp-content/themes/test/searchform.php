<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
                <input type="text" name="s" id="s" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <input type="submit" id="searchsubmit" class="btn btn-secondary" value="Go!" />
                   <!-- <button id="searchsubmit" class="btn btn-secondary" type="button">Go!</button>-->
                </span>
            </form>
        </div>
    </div>
</div>