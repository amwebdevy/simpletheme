<div id="search-wrap" class="col-xs-12">
    <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" autocomplete="off">
        <input id="search" type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" title="Search" placeholder="Search"/>     
        <span id="search_submit" class="simple-icon simple-search"></span>
    </form> 
</div>