<?php

/**
 * Template for front page
 */

get_header(); ?>
    <div class="wrap-front-page">
        <div class="wrap-container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/content', 'front-page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
        <div class="media-section">
            <div class="title-media-section">
                <div class="wrap-container">
                    <?php if (is_active_sidebar('front-media')) :
                        dynamic_sidebar('front-media');
                    endif; ?>
                </div>
            </div>
            <div class="wrap-container">
                <div class="block-media">
                    <ul class="parrent-container">
                        <?php
                        $args = array(
                            'post_type' => 'video_gallery',
                            'posts_per_page' => 6,


                        );
                        $post = new WP_Query($args);
                        if ($post->have_posts()) {

                            $attachments = get_posts(array(
                                'post_type' => 'attachment',
                                'posts_per_page' => -1,
                                'post_parent' => $post->ID,
                                'post_mime_type' => 'video',
                                'order'=> 'ASC'


                            ));

                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                    $thumbimg = wp_get_attachment_url($attachment->ID);
                                    $title = get_the_title($attachment->ID);
                                    $thumb_video = get_the_post_thumbnail($attachment->ID, 'video-gallery');

                                    echo '<li class="media-inner"> <a  href=" ' . $thumbimg . '"> <div> ' . $thumb_video . '</div> </a>  <h4 class=video-title> ' . $title . '  </h4></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!--    <div>-->
    <!--        --><?php
//        $args = array(
//            'post_type' => 'video_gallery',
//            'posts_per_page' => 6
//        );
//        $video = new WP_Query($args);
//        if ($video->have_posts()) :
////    / Start the Loop /
//            while ($video->have_posts()) :
//                $video->the_post();
//
//                get_template_part('template-parts/content', get_post_format());
//            endwhile;
//        else : echo '<h3>No media</h3>';
//        endif;
//        ?>
    <!--    </div>-->


<?php

