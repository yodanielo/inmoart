<div class="contentarea">
    <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">


        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post() ?>

        <div id="post-<?php the_ID(); ?>" class="posts">



            <div class="post_top clearfix">

                <div class="post_top_l">
                    <h1><?php the_title(); ?></h1>
                    <p class="postmetadata">Posted  by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y') ?> //
                        <span class="commentcount"> <a href="<?php the_permalink(); ?>#commentarea"><?php comments_number('0 Comments', '1 Comments', '% Comments'); ?></a></span></p>
                </div>

                        <?php get_user_profile_pic($post->post_author,35,35); ?>
            </div>

                    <?php the_content(); ?>

            <p class="post_bottom">Category : <?php the_category(" &amp;"); ?></p>

        </div><!--/post-->


        <div class="single_post_advt">
                    <?php if ( get_option('ptthemes_single_post_advt') != "") { ?>
                        <?php echo stripslashes(get_option('ptthemes_single_post_advt'));  ?>
                        <?php } ?>
        </div>


        <div id="comments">  <?php comments_template(); ?></div>

            <?php endwhile; ?>
        <?php endif; ?>





    </div>


    <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
        <div class="sidebar_top">
            <div class="sidebar_bottom">
                <?php dynamic_sidebar(5);  ?>
            </div>
        </div>
    </div>


</div>
