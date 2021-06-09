<?php get_header(); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="my-4">Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- Blog Post -->
            <?php
            if(have_posts()){
                while (have_posts()){
                    the_post();
                    $post =get_the_ID();
                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'thumbnail'));
                    ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="<?php echo $url;?>" alt="Card image cap">
                        <!--                        --><?php //the_post_thumbnail(array(600,300));?>
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title();?></h2>
                            <p class="card-text"><?php the_content();?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on January 1, 2020 by
                            <a href="#">Start Bootstrap</a>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>
            <div id="products-new-arrivals">
                <h3>New Arrivals</h3>
                <?php
                $new_arrivals_limit = get_theme_mod("set_new_arrival_limit");
                $new_arrivals_columns = get_theme_mod("set_new_arrival_column");
                ?>
                <?php echo do_shortcode('[products limit="'.$new_arrivals_limit.'" columns="'.$new_arrivals_columns.'" orderby="date"]') ;?>
            </div>
            <div id="products-new-arrivals">
                <h3>Popular Products</h3>
                <?php
                $popular_limit = get_theme_mod("set_popular_limit");
                $popular_columns = get_theme_mod("set_popular_column");
                ?>
                <?php echo do_shortcode('[products limit="'.$popular_limit.'" columns="'.$popular_columns.'" orderby="popularity"]') ;?>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <?php
                    get_search_form();
                    ?>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer(); ?>
