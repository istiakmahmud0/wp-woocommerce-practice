<?php get_header(); ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
//                    $post =get_the_ID();
//                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'thumbnail'));
                    ?>
                    <div class="card mb-4">
                        <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title(); ?></h2>
                            <p class="card-text"><?php the_content(); ?></p>

                        </div>

                    </div>

                    <?php
                }
            }
            ?>

        </div>


    </div>


</div>


<?php get_footer(); ?>
