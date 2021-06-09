<div class="input-group">
    <form action="<?php echo get_home_url(); ?>" method="get">
    <input type="search" class="form-control" placeholder="Search for..." name="s"
           value="<?php the_search_query(); ?>">
    <span class="input-group-append">
     <button class="btn btn-secondary" type="submit">Go!</button>
   </span>
    </form>
</div>


