<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("a.switch_thumb").toggle(function(){
            $(this).addClass("swap");
            $("ul.display").fadeOut("fast", function() {
                $(this).fadeIn("fast").removeClass("thumb_view");
            });
        }, function () {
            $(this).removeClass("swap");
            $("ul.display").fadeOut("fast", function() {
                $(this).fadeIn("fast").addClass("thumb_view");
            });
        });

    });
</script>
<div class="wrapper">
    <div class="contentarea_home contentarea_home_right">
<div class="contentarea">
    <!--<div class="content" >supuestamente no deberia estar aqui-->
    <div class="latestproperties latestproperties_right" style="padding-right: 15px;">
        <h5><span><a href="#" class="switch_thumb"><?php _e(SWITCH_THUMB_TEXT);?></a></span>
            <?php
            echo single_cat_title();
            ?></h5>
        <?php if(have_posts()) { ?>
        <ul class="display ">
                <?php
                $count=0;
                while(have_posts()) {
                    $count++;
                    the_post();
                    get_property_info_li($post);
                    if($count%3==0) {
                        ?>
            <li class="blank"></li>
            <?php
                    }
                }
                ?>
        </ul>
    <?php
        }else {
            _e(NO_PROPERTY_AVAILABLE_MSG);
            if($_POST['search']=='search') {
                echo get_search_param();
            }
        }
        ?>

        <div class="pagination">
        <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
        </div>
    </div>

<?php get_sidebar(); ?>  <!-- sidebar #end -->
</div>
</div>
</div>